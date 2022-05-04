<?php

namespace App\Repository;

use App\Entity\ActualPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActualPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActualPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActualPlace[]    findAll()
 * @method ActualPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActualPlace::class);
    }

    // /**
    //  * @return ActualPlace[] Returns an array of ActualPlace objects
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
    public function findOneBySomeField($value): ?ActualPlace
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
