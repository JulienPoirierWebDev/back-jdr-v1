<?php

namespace App\Repository;

use App\Entity\PresentNpc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PresentNpc|null find($id, $lockMode = null, $lockVersion = null)
 * @method PresentNpc|null findOneBy(array $criteria, array $orderBy = null)
 * @method PresentNpc[]    findAll()
 * @method PresentNpc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentNpcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PresentNpc::class);
    }

    // /**
    //  * @return PresentNpc[] Returns an array of PresentNpc objects
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
    public function findOneBySomeField($value): ?PresentNpc
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
