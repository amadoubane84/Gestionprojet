<?php

namespace App\Repository;

use App\Entity\Rmensuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rmensuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rmensuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rmensuel[]    findAll()
 * @method Rmensuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RmensuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rmensuel::class);
    }

    // /**
    //  * @return Rmensuel[] Returns an array of Rmensuel objects
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
    public function findOneBySomeField($value): ?Rmensuel
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
