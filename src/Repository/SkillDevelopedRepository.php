<?php

namespace App\Repository;

use App\Entity\SkillDeveloped;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkillDeveloped|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillDeveloped|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillDeveloped[]    findAll()
 * @method SkillDeveloped[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillDevelopedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillDeveloped::class);
    }

    // /**
    //  * @return SkillDeveloped[] Returns an array of SkillDeveloped objects
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
    public function findOneBySomeField($value): ?SkillDeveloped
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
