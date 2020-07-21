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

class TopDomainsRepository extends EntityRepository
{
    /**
     * find phrase
     *
     * @param int $page
     * @param array $data
     *
     * @return array
    */
    public function findByInTopDomains($page, array $data)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT td FROM AppBundle:TopDomains td WHERE td.page = :page AND td.domain IN (:domains) 
            ")
            ->setParameters(["page" => $page, "domains" => $data]);

        try {
            return $query->getResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}