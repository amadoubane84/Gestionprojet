<?php

namespace App\Repository;

use App\Entity\Pvmensuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pvmensuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pvmensuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pvmensuel[]    findAll()
 * @method Pvmensuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PvmensuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pvmensuel::class);
    }

    // /**
    //  * @return Pvmensuel[] Returns an array of Pvmensuel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pvmensuel
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
