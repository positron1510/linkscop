<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 22.06.16
 * Time: 12:36
 */

namespace AppBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends FOSRestController
{
    /**
     * @ApiDoc(
     *     description="Пагинация заданий",
     *     statusCodes={
     *         200="Нормальный ответ",
     *     }
     * )
     *
     * @param Request $request
     *
     * @Route("/taskShow", name="show_task", defaults={"_format": "json"})
     * @Method({"GET"})
     *
     * @Rest\View(serializerGroups={"tasks"})
     *
     * @return array
     */
    public function listAction(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $order = $request->get('order');
        $column = $request->get('columns');

        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository("AppBundle:Task")
            ->findBy([], [$column[$order[0]['column']]['name'] => $order[0]['dir']], $length, $start);

        $count = $em->getRepository("AppBundle:Task")
            ->findOneByCountTask();

        return [
            "draw" => $draw,
            "recordsTotal" => $count[1],
            "recordsFiltered" => $count[1],
            "data" => $tasks
        ];
    }

    /**
     * @ApiDoc(
     *     description="Удаляем проект",
     *     statusCodes={
     *         200="Нормальный ответ",
     *         404="Task not found"
     *     }
     * )
     *
     * @param int $id
     *
     * @Route("/removeTask/{id}", name="remove_task", defaults={"_format": "json"}, requirements={
     *     "id": "\d+"
     * })
     * @Method({"GET"})
     *
     * @Rest\View()
     *
     * @return string
     */
    public function removeTaskAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository("AppBundle:Task")
            ->findOneBy(['id' => $id]);

        if (!$task) {
            $view = $this->view("Task not found", 404);
            return $this->handleView($view);
        }

        $redis = $this->get("snc_redis.default");
        $redis->del("task_".$id);

        $em->remove($task);
        $em->flush();

        if (is_file('tasks/'.$id.'/majestic')) {
            unlink('tasks/'.$id.'/majestic');
            try{
                rmdir("tasks/$id");
            }catch(\ErrorException $ex){}
        }

        return 'successful';
    }

    /**
     * @ApiDoc(
     *     description="Удаляем пользователя",
     *     statusCodes={
     *         200="Нормальный ответ",
     *         404="Task not found"
     *     }
     * )
     *
     * @param int $id
     *
     * @Route("/removeUser/{id}", name="remove_user", defaults={"_format": "json"}, requirements={
     *     "id": "\d+"
     * })
     * @Method({"GET"})
     *
     * @Rest\View()
     *
     * @return string
     */
    public function removeUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("AppBundle:User")
            ->findOneBy(['id' => $id]);

        if (!$user) {
            $view = $this->view("User not found", 404);
            return $this->handleView($view);
        }

        $em->remove($user);
        $em->flush();

        return 'successful';
    }

    /**
     * @ApiDoc(
     *     description="Получаем данные пользовавтеля",
     *     statusCodes={
     *         200="Нормальный ответ",
     *         404="User not found"
     *     }
     * )
     *
     * @param int $id
     *
     * @Route("/user/{id}", name="user", defaults={"_format": "json"}, requirements={
     *     "id": "\d+"
     * })
     * @Method({"GET"})
     *
     * @Rest\View(serializerGroups={"users"})
     *
     * @return string
     */
    public function userAction($id)
    {
        $user = $this->getUser();
        if ($user->getId() != $id) {
            $user = $this->getDoctrine()->getRepository("AppBundle:User")
                ->findOneBy(['id' => $id]);

            if (!$user) {
                $view = $this->view("User not found", 404);
                return $this->handleView($view);
            }
        }

        return $user;
    }
}