<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Page;
use AppBundle\Entity\Phrase;
use AppBundle\Entity\Task;
use AppBundle\Form\Type\TaskType;
use AppBundle\Form\Type\RestartTaskType;
#use AppBundle\Support\Majestic;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    /**
     * Main List Task
     *
     * @Route("/", name="list_task", methods={"GET"})
     */
    public function listAction()
    {
        $tasks = $this->getDoctrine()->getRepository("AppBundle:Task")
            ->findBy([], ['createdAt' => 'desc'], 10, 0);

        return $this->render(':default:list.html.twig', [
            'tasks' => $tasks,
            'isList' => true,
        ]);
    }


    /**
     * Main List Task
     *
     * @param int $id
     *
     * @Route("/project/{id}", name="task_project", methods={"GET"})
     *
     * @return object
     */
    public function projectAction($id)
    {
        $task = $this->getDoctrine()->getRepository("AppBundle:Task")
            ->findByOneTwoProject($id);

        return $this->render(':default:project_new.html.twig', [
            'task' => $task,
            'isList' => true,
        ]);
    }

    /**
     * Create Task
     *
     * @param Request $request
     *
     * @Route("/create", name="create_task", methods={"GET", "POST"})
     *
     * @return mixed
     */
    public function createAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task, [
            'action' => $this->generateUrl("create_task"),
            'method' => 'post',
        ]);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $data = $form->get("textarea")->getData();
            $file = $form->get("file")->getData();

            if (!$data || !$file)
            {
                $parserString = $this->get('parser_string');

                if ($file) {
                    $filename = $fileName = md5(uniqid()).'.'.$file->guessExtension();
                    $file->move($this->getParameter("file_directory"), $filename);

                    $parserString->setData($filename);
                    $dataRedis['parse'] = $parserString->getCSVWords();
                } else {
                    $parserString->setData($data);
                    $dataRedis['parse'] = $parserString->getStringWords();
                }
                
                if ($parserString->isParse())
                    return $this->render(':default:create.html.twig', [
                        'form' => $form->createView(),
                        'errorImport' => true,
                        'isCreate' => true,
                    ]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($task);
                $em->flush();

                $dataRedis['region'] = $task->getRegion()->getCode();
                $dataRedis['top'] = $task->getTop()->getTop();

                $this->get('old_sound_rabbit_mq.app.consumer.tasks_producer')
                    ->publish(json_encode(['id' => $task->getId()]));

                $redis = $this->get('snc_redis.default');
                $redis->set('task_'.$task->getId(), json_encode($dataRedis));

                return $this->redirectToRoute('list_task');
            }

            return $this->render(':default:create.html.twig', [
                'form' => $form->createView(),
                'errorWords' => true,
                'isCreate' => true,
            ]);
        }

        return $this->render(':default:create.html.twig', [
            'form' => $form->createView(),
            'isCreate' => true,
        ]);
    }

    /**
     * Create Task
     *
     * @param Request $request
     * @param int $id
     *
     * @Route("/restart/{id}", name="restart_task", methods={"GET", "POST"}, requirements={
     *     "id": "\d+"
     * })
     *
     * @return mixed
     */
    public function restartAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository("AppBundle:Task")
            ->findOneByProject($id);

        $form = $this->createForm(RestartTaskType::class, $task, [
            'action' => $this->generateUrl("restart_task", ['id' => $id]),
            'method' => 'post',
        ]);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            if (is_file('tasks/'.$id.'/majestic')) {
                unlink('tasks/'.$id.'/majestic');
            }

            $parserString = $this->get('parser_string');
            $parserString->setData($form->get("textarea")->getData());
            $data = $parserString->getStringWords();

            $em->persist($task);
            $em->flush();

            $data = [
                'parse' => $data,
                'region' => $task->getRegion()->getCode(),
                'top' => $task->getTop()->getTop(),
            ];

            $this->get('old_sound_rabbit_mq.app.consumer.tasks_producer')
                ->publish(json_encode(['id' => $task->getId()]));

            $redis = $this->get('snc_redis.default');
            $redis->set('task_'.$task->getId(), json_encode($data));

            return $this->redirectToRoute('list_task');
        }

        $phrases = array_map(function ($data) {
            /* @var Page $data */
            $page = $data->getPage();
            $data = array_map(function ($data) {
                /* @var Phrase $data */
                return $data->getPhrase();
            }, $data->getPhrase()->toArray());

            $data = implode("\n", $data);
            $data = [$page, $data];

            return implode("\n", $data);
        }, $task->getPage()->toArray());

        $form->get("textarea")->setData(implode("\n\n", $phrases));

        return $this->render(':default:create.html.twig', [
            'form' => $form->createView(),
            'isList' => true,
        ]);
    }
}