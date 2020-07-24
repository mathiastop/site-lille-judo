<?php

namespace App\Repository;

use App\Entity\HistoriqueEnseignement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoriqueEnseignement|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueEnseignement|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueEnseignement[]    findAll()
 * @method HistoriqueEnseignement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueEnseignementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueEnseignement::class);
    }

    // /**
    //  * @return HistoriqueEnseignement[] Returns an array of HistoriqueEnseignement objects
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
    public function findOneBySomeField($value): ?HistoriqueEnseignement
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
