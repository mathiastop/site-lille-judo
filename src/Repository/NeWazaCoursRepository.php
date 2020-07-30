<?php

namespace App\Repository;

use App\Entity\NeWazaCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NeWazaCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method NeWazaCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method NeWazaCours[]    findAll()
 * @method NeWazaCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NeWazaCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NeWazaCours::class);
    }

    // /**
    //  * @return NeWazaCours[] Returns an array of NeWazaCours objects
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
    public function findOneBySomeField($value): ?NeWazaCours
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
