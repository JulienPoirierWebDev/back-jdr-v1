<?php

namespace App\Repository;

use App\Entity\GoalInAdventure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoalInAdventure|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoalInAdventure|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoalInAdventure[]    findAll()
 * @method GoalInAdventure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoalInAdventureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoalInAdventure::class);
    }

    // /**
    //  * @return GoalInAdventure[] Returns an array of GoalInAdventure objects
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
    public function findOneBySomeField($value): ?GoalInAdventure
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
