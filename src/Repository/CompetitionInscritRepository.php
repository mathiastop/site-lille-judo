<?php

namespace App\Repository;

use App\Entity\CompetitionInscrit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompetitionInscrit|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompetitionInscrit|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompetitionInscrit[]    findAll()
 * @method CompetitionInscrit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetitionInscritRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompetitionInscrit::class);
    }

    // /**
    //  * @return CompetitionInscrit[] Returns an array of CompetitionInscrit objects
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
    public function findOneBySomeField($value): ?CompetitionInscrit
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
