<?php

namespace App\Repository;

use App\Entity\PostClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostClub[]    findAll()
 * @method PostClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostClub::class);
    }

    // /**
    //  * @return PostClub[] Returns an array of PostClub objects
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
    public function findOneBySomeField($value): ?PostClub
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
