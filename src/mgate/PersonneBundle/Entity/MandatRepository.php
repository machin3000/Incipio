<?php

namespace mgate\PersonneBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MandatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MandatRepository extends EntityRepository
{
    public function getCotisantMandats()
    {
        $qb = $this->_em->createQueryBuilder();
        $query = $qb->select('ma')->from('mgatePersonneBundle:mandat', 'ma')
          ->innerJoin('ma.poste', 'p')
          ->orderBy('ma.debutMandat')
          ->where("p.intitule LIKE 'Membre'");
        return $query->getQuery()->getResult();
    }
}
