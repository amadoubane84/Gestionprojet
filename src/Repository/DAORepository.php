<?php

namespace App\Repository;

use App\Entity\DAO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DAO|null find($id, $lockMode = null, $lockVersion = null)
 * @method DAO|null findOneBy(array $criteria, array $orderBy = null)
 * @method DAO[]    findAll()
 * @method DAO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DAORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DAO::class);
    }

    // /**
    //  * @return DAO[] Returns an array of DAO objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DAO
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
