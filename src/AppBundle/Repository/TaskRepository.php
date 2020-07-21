<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 12:54
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Task;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class TaskRepository extends EntityRepository
{
    /**
     * count task
     *
     * @return Task
     */
    public function findOneByCountTask()
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT count(t) FROM AppBundle:Task t 
            ");

        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }

    /**
     * find domain
     *
     * @param int $id
     *
     * @return Task
    */
    public function findOneByProject($id)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT t, tp, rg, p, ph, td, d FROM AppBundle:Task t 
                  LEFT JOIN t.page p
                  LEFT JOIN t.top tp
                  LEFT JOIN t.region rg
                  LEFT JOIN p.phrase ph
                  LEFT JOIN p.topDomains td
                  LEFT JOIN td.domain d
                WHERE t.id = :id
            ")
            ->setParameter("id", $id);

        try {
            return $query->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }

    /**
     * @param int $id
     * @return array
     *
     *
     */
    public function findByOneTwoProject(int $id):array
    {
        $connection = $this->getEntityManager()
            ->getConnection()
            ->getWrappedConnection();

        $stmt = $connection->prepare("SELECT * FROM find_one_project(?)");
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchALL(\PDO::FETCH_ASSOC)[0];

        $task = $result['task_name'];
        $top = $result['top'];
        $top_number = (int)ltrim($top, "Топ ");
        $region = $result['region'];
        $pages = array_map(function ($el){return trim($el, "{}\\\"");}, preg_split("/\}[\"]*,[\"]*\{/uisU", $result['pages'], -1, PREG_SPLIT_NO_EMPTY));
        $result['phrases'] = "{\"" . trim($result['phrases'], "\\{}\"") . "\"}}";
        preg_match_all("/\{.*\}/uisU", $result['phrases'], $matches);

        try{
            $phrases = $matches[0];
            $phrases = array_map(function ($el){return trim($el, "{}\\\"");}, $phrases);
        }catch (\ErrorException $ex){
            $phrases = [];
        }

        preg_match_all("/\{http.*\}/uisU", $result['domains'], $matches);

        try{
            $domains = $matches[0];
            $domains = array_map(function ($el){return trim($el, "{}");}, $domains);
        }catch (\ErrorException $ex){
            $domains = [];
        }

        $project_data = [];

        foreach ($pages as $page) {
            $arr_page = explode(',', $page);
            $url = (string)rtrim($arr_page[0], "/");
            $page_id = (int)$arr_page[1];

            $project_data[$url] = [];
            $project_data[$url]['phrases'] = [];
            $project_data[$url]['domains'] = [];

            foreach ($phrases as $phrase) {
                $arr_phrase = explode(',', $phrase);
                $id_page = (int)array_pop($arr_phrase);
                if ($id_page === $page_id) {
                    $arr_phrase = array_map(function ($el){return trim($el, "\\\"");}, $arr_phrase);
                    $project_data[$url]['phrases'][] = [
                        'phrase' => (string)$arr_phrase[0],
                        'wordstat' => (int)$arr_phrase[1],
                    ];
                }
            }

            $counter = 0;
            foreach ($domains as $domain) {
                $arr_domain = explode(',', $domain);
                $id_page = (int)array_pop($arr_domain);

                if ($id_page === $page_id) {
                    $d = (string)rtrim($arr_domain[0], '/');
                    if ($counter >= $top_number && $d !== $url) continue;

                    $is_www = $arr_domain[4] == 'true' ? true : false;
                    $project_data[$url]['domains'][] = [
                        'domain' => (string)rtrim($arr_domain[0], '/'),
                        'domains' => (int)$arr_domain[1],
                        'hrefs' => (int)$arr_domain[2],
                        'visible' => (float)$arr_domain[3],
                        'is_www' => $is_www,
                    ];

                    $counter++;
                }
            }

            usort($project_data[$url]['domains'], function ($a, $b){return $a['visible'] <= $b['visible'];});

            $use_domains = [];
            foreach ($project_data[$url]['domains'] as $k=>$item) {
                if (!in_array($item['domain'], $use_domains)) {
                    $use_domains[] = $item['domain'];
                }else {
                    unset($project_data[$url]['domains'][$k]);
                }
            }
        }

        return ['task'=>$task, 'top'=>$top, 'region'=>$region, 'pages'=>$project_data];
    }
}