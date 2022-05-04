<?php

namespace App\Repository;

use App\Entity\NpcJob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NpcJob|null find($id, $lockMode = null, $lockVersion = null)
 * @method NpcJob|null findOneBy(array $criteria, array $orderBy = null)
 * @method NpcJob[]    findAll()
 * @method NpcJob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NpcJobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NpcJob::class);
    }

    // /**
    //  * @return NpcJob[] Returns an array of NpcJob objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NpcJob
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
