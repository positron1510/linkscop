<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 12:54
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class PageRepository extends EntityRepository
{
    /**
     * find phrase
     *
     * @param int $id
     * @param array $data
     *
     * @return array
    */
    public function findByInPage($id, array $data)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT p FROM AppBundle:Page p WHERE p.task = :id AND p.page IN (:domains) 
            ")
            ->setParameters(["id" => $id, "domains" => $data]);

        try {
            return $query->getResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}