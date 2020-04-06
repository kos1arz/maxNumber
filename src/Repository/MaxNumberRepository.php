<?php

namespace App\Repository;

use App\Entity\MaxNumber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaxNumber|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaxNumber|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaxNumber[]    findAll()
 * @method MaxNumber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaxNumberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaxNumber::class);
    }

    // /**
    //  * @return MaxNumber[] Returns an array of MaxNumber objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaxNumber
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
