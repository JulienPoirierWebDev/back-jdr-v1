<?php

namespace App\Repository;

use App\Entity\GoalType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoalType|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoalType|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoalType[]    findAll()
 * @method GoalType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoalTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoalType::class);
    }

    // /**
    //  * @return GoalType[] Returns an array of GoalType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoalType
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
