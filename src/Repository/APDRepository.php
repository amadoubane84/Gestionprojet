<?php

namespace App\Repository;

use App\Entity\APD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method APD|null find($id, $lockMode = null, $lockVersion = null)
 * @method APD|null findOneBy(array $criteria, array $orderBy = null)
 * @method APD[]    findAll()
 * @method APD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class APDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, APD::class);
    }

    // /**
    //  * @return APD[] Returns an array of APD objects
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
    public function findOneBySomeField($value): ?APD
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
