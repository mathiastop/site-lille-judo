<?php

namespace App\Repository;

use App\Entity\Dojo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dojo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dojo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dojo[]    findAll()
 * @method Dojo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DojoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dojo::class);
    }

    // /**
    //  * @return Dojo[] Returns an array of Dojo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dojo
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
