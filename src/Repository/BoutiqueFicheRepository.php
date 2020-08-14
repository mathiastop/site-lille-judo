<?php

namespace App\Repository;

use App\Entity\BoutiqueFiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoutiqueFiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoutiqueFiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoutiqueFiche[]    findAll()
 * @method BoutiqueFiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoutiqueFicheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoutiqueFiche::class);
    }

    // /**
    //  * @return BoutiqueFiche[] Returns an array of BoutiqueFiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BoutiqueFiche
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
