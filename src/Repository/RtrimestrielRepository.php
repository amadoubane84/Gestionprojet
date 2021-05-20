<?php

namespace App\Repository;

use App\Entity\Rtrimestriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rtrimestriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rtrimestriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rtrimestriel[]    findAll()
 * @method Rtrimestriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RtrimestrielRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rtrimestriel::class);
    }

    // /**
    //  * @return Rtrimestriel[] Returns an array of Rtrimestriel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rtrimestriel
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
