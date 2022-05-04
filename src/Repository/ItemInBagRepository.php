<?php

namespace App\Repository;

use App\Entity\ItemInBag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItemInBag|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemInBag|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemInBag[]    findAll()
 * @method ItemInBag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemInBagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemInBag::class);
    }

    // /**
    //  * @return ItemInBag[] Returns an array of ItemInBag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemInBag
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
