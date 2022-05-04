<?php

namespace App\Repository;

use App\Entity\NpcOnAdventure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NpcOnAdventure|null find($id, $lockMode = null, $lockVersion = null)
 * @method NpcOnAdventure|null findOneBy(array $criteria, array $orderBy = null)
 * @method NpcOnAdventure[]    findAll()
 * @method NpcOnAdventure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NpcOnAdventureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NpcOnAdventure::class);
    }

    // /**
    //  * @return NpcOnAdventure[] Returns an array of NpcOnAdventure objects
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
    public function findOneBySomeField($value): ?NpcOnAdventure
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
