<?php

namespace App\Repository;

use App\Entity\Pvhebdomadaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pvhebdomadaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pvhebdomadaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pvhebdomadaire[]    findAll()
 * @method Pvhebdomadaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PvhebdomadaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pvhebdomadaire::class);
    }

    // /**
    //  * @return Pvhebdomadaire[] Returns an array of Pvhebdomadaire objects
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
    public function findOneBySomeField($value): ?Pvhebdomadaire
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
