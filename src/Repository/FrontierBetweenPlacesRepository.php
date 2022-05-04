<?php

namespace App\Repository;

use App\Entity\FrontierBetweenPlaces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FrontierBetweenPlaces|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrontierBetweenPlaces|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrontierBetweenPlaces[]    findAll()
 * @method FrontierBetweenPlaces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrontierBetweenPlacesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrontierBetweenPlaces::class);
    }

    // /**
    //  * @return FrontierBetweenPlaces[] Returns an array of FrontierBetweenPlaces objects
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
    public function findOneBySomeField($value): ?FrontierBetweenPlaces
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
