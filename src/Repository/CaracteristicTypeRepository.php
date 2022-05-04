<?php

namespace App\Repository;

use App\Entity\CaracteristicType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CaracteristicType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaracteristicType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaracteristicType[]    findAll()
 * @method CaracteristicType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaracteristicTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CaracteristicType::class);
    }

    // /**
    //  * @return CaracteristicType[] Returns an array of CaracteristicType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CaracteristicType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
