<?php

namespace App\Repository;

use App\Entity\SkillInAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkillInAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillInAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillInAction[]    findAll()
 * @method SkillInAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillInActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillInAction::class);
    }

    // /**
    //  * @return SkillInAction[] Returns an array of SkillInAction objects
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
    public function findOneBySomeField($value): ?SkillInAction
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
