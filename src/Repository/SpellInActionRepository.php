<?php

namespace App\Repository;

use App\Entity\SpellInAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpellInAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpellInAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpellInAction[]    findAll()
 * @method SpellInAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpellInActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpellInAction::class);
    }

    // /**
    //  * @return SpellInAction[] Returns an array of SpellInAction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpellInAction
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
