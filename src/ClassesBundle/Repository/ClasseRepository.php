<?php

namespace ClassesBundle\Repository;

/**
 * ClasseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClasseRepository extends \Doctrine\ORM\EntityRepository
{
    public function searchEtudiants($input)
    {
        $query=$this->getEntityManager()->createQuery("SELECT c FROM AppBundle:User c WHERE c.classe='$input'");
        return $query->getResult();
    }
}