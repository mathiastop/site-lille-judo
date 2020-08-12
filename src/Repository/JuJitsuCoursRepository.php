<?php

namespace App\Repository;

use App\Entity\JuJitsuCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JuJitsuCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method JuJitsuCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method JuJitsuCours[]    findAll()
 * @method JuJitsuCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JuJitsuCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JuJitsuCours::class);
    }

    public function findAllExceptThisOrder($int)
    {
        return $this->createQueryBuilder('dojo')
            ->andWhere('dojo.ordre != :int')
            ->orderBy('dojo.ordre', 'ASC')
            ->setParameter('int', $int)
            ->getQuery()
            ->execute();
    }
    // /**
    //  * @return JuJitsuCours[] Returns an array of JuJitsuCours objects
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
    public function findOneBySomeField($value): ?JuJitsuCours
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
