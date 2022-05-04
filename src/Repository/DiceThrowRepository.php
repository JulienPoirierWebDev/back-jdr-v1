<?php

namespace App\Repository;

use App\Entity\DiceThrow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiceThrow|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiceThrow|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiceThrow[]    findAll()
 * @method DiceThrow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiceThrowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiceThrow::class);
    }

    // /**
    //  * @return DiceThrow[] Returns an array of DiceThrow objects
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
    public function findOneBySomeField($value): ?DiceThrow
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
