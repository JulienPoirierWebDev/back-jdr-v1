<?php

namespace App\Repository;

use App\Entity\PlayerCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerCharacter[]    findAll()
 * @method PlayerCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerCharacter::class);
    }

    // /**
    //  * @return PlayerCharacter[] Returns an array of PlayerCharacter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerCharacter
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
