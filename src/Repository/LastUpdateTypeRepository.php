<?php

namespace App\Repository;

use App\Entity\LastUpdateType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LastUpdateType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LastUpdateType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LastUpdateType[]    findAll()
 * @method LastUpdateType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LastUpdateTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LastUpdateType::class);
    }

    // /**
    //  * @return LastUpdateType[] Returns an array of LastUpdateType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LastUpdateType
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
