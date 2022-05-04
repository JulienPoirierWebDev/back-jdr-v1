<?php

namespace App\Repository;

use App\Entity\FrontierPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FrontierPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrontierPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrontierPlace[]    findAll()
 * @method FrontierPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrontierPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrontierPlace::class);
    }

    // /**
    //  * @return FrontierPlace[] Returns an array of FrontierPlace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FrontierPlace
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
