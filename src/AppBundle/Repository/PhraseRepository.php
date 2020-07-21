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

class PhraseRepository extends EntityRepository
{
    /**
     * find phrase
     *
     * @param array $data
     *
     * @return array
    */
    public function findByInPhrase(array $data)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT p FROM AppBundle:Phrase p WHERE p.phrase IN (:phrases) 
            ")
            ->setParameter("phrases", $data);

        try {
            return $query->getResult();
        } catch (NoResultException $e) {
            return null;
        }
    }

    /**
     * find phrase
     *
     * @param int $id
     * @param array $data
     *
     * @return array
     */
    public function findByPageInPhrase($id, array $data)
    {
        $query = $this->getEntityManager()
            ->createQuery("
                SELECT p FROM AppBundle:Phrase p 
                  LEFT JOIN p.page pg
                WHERE 
                  pg.id = :id
                  AND p.phrase IN (:phrases)
            ")
            ->setParameters(["id" => $id, "phrases" => $data]);

        try {
            return $query->getResult();
        } catch (NoResultException $e) {
            return null;
        }
    }
}