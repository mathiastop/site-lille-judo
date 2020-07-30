<?php

namespace App\Repository;

use App\Entity\JudoCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JudoCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method JudoCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method JudoCours[]    findAll()
 * @method JudoCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JudoCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JudoCours::class);
    }

    // /**
    //  * @return JudoCours[] Returns an array of JudoCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JudoCours
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
