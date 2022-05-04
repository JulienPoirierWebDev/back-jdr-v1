<?php

namespace App\Repository;

use App\Entity\AdventureCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdventureCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdventureCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdventureCard[]    findAll()
 * @method AdventureCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdventureCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdventureCard::class);
    }

    // /**
    //  * @return AdventureCard[] Returns an array of AdventureCard objects
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
    public function findOneBySomeField($value): ?AdventureCard
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
