<?php

namespace App\Repository;

use App\Entity\MessageInChat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MessageInChat|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageInChat|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageInChat[]    findAll()
 * @method MessageInChat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageInChatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageInChat::class);
    }

    // /**
    //  * @return MessageInChat[] Returns an array of MessageInChat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MessageInChat
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
