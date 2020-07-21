<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 06.06.16
 * Time: 12:54
 */

namespace AppBundle\Repository;

use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class DomainRepository extends EntityRepository
{
    /**
     * find domain
     *
     * @param array $data
     *
     * @return array
    */
    public function findByInDomain(array $data)
    {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult("AppBundle:Domain", "d");
        $rsm->addFieldResult("d", "id", "id");
        $rsm->addFieldResult("d", "domain", "domain");
        $rsm->addFieldResult("d", "domains", "domains");
        $rsm->addFieldResult("d", "hrefs", "hrefs");
        $rsm->addFieldResult("d", "is_www", "isWWW");

        $query = $this->getEntityManager()
            ->createNativeQuery("
                SELECT d.id, d.domain, d.domains, d.hrefs, d.is_www FROM domain d WHERE d.domain IN (?) 
            ", $rsm)
            ->setParameter(1, $data);

        try {
            return $query->getResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}