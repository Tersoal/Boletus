<?php

namespace BoletusBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CajaRepository extends EntityRepository
{
    public function findCajasBySeccion($seccionId = null)
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $query
            ->select('c')
            ->from('BoletusBundle:Caja', 'c')
        ;

        if ($seccionId !== null) {
            $query
                ->innerJoin('BoletusBundle:Seccion', 's')
                ->andWhere('s.id = :id')->setParameter('id', $seccionId)
//                ->andWhere('c.categoria = s.categorias')
                ->andWhere('c.categoria IN s.categorias')
            ;
        }
        
        return $query->getQuery()->getResult();
    }
}

