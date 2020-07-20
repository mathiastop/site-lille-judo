<?php

namespace App\Repository;

use App\Entity\PostNatio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostNatio|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostNatio|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostNatio[]    findAll()
 * @method PostNatio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostNatioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostNatio::class);
    }

    // /**
    //  * @return PostNatio[] Returns an array of PostNatio objects
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
    public function findOneBySomeField($value): ?PostNatio
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
