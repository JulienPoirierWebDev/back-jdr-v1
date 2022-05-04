<?php

namespace App\Repository;

use App\Entity\PowerDeveloped;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PowerDeveloped|null find($id, $lockMode = null, $lockVersion = null)
 * @method PowerDeveloped|null findOneBy(array $criteria, array $orderBy = null)
 * @method PowerDeveloped[]    findAll()
 * @method PowerDeveloped[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PowerDevelopedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PowerDeveloped::class);
    }

    // /**
    //  * @return PowerDeveloped[] Returns an array of PowerDeveloped objects
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
    public function findOneBySomeField($value): ?PowerDeveloped
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
