<?php

namespace App\Repository;

use App\Entity\ItemInAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItemInAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemInAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemInAction[]    findAll()
 * @method ItemInAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemInActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemInAction::class);
    }

    // /**
    //  * @return ItemInAction[] Returns an array of ItemInAction objects
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
    public function findOneBySomeField($value): ?ItemInAction
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
