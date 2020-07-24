<?php

namespace App\Repository;

use App\Entity\HistoriquePersonnalites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoriquePersonnalites|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriquePersonnalites|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriquePersonnalites[]    findAll()
 * @method HistoriquePersonnalites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriquePersonnalitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriquePersonnalites::class);
    }

    // /**
    //  * @return HistoriquePersonnalites[] Returns an array of HistoriquePersonnalites objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoriquePersonnalites
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
