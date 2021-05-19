<?php

namespace App\Repository;

use App\Entity\APS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method APS|null find($id, $lockMode = null, $lockVersion = null)
 * @method APS|null findOneBy(array $criteria, array $orderBy = null)
 * @method APS[]    findAll()
 * @method APS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class APSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, APS::class);
    }

    // /**
    //  * @return APS[] Returns an array of APS objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?APS
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
