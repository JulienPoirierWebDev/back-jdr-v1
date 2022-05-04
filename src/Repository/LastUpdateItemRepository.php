<?php

namespace App\Repository;

use App\Entity\LastUpdateItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LastUpdateItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method LastUpdateItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method LastUpdateItem[]    findAll()
 * @method LastUpdateItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LastUpdateItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LastUpdateItem::class);
    }

    // /**
    //  * @return LastUpdateItem[] Returns an array of LastUpdateItem objects
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
    public function findOneBySomeField($value): ?LastUpdateItem
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
