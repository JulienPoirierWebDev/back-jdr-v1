<?php

namespace App\Repository;

use App\Entity\NpcStrength;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NpcStrength|null find($id, $lockMode = null, $lockVersion = null)
 * @method NpcStrength|null findOneBy(array $criteria, array $orderBy = null)
 * @method NpcStrength[]    findAll()
 * @method NpcStrength[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NpcStrengthRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NpcStrength::class);
    }

    // /**
    //  * @return NpcStrength[] Returns an array of NpcStrength objects
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
    public function findOneBySomeField($value): ?NpcStrength
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
