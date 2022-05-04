<?php

namespace App\Repository;

use App\Entity\QuestInAdventure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuestInAdventure|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestInAdventure|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestInAdventure[]    findAll()
 * @method QuestInAdventure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestInAdventureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuestInAdventure::class);
    }

    // /**
    //  * @return QuestInAdventure[] Returns an array of QuestInAdventure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestInAdventure
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
