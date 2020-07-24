<?php

namespace App\Repository;

use App\Entity\HistoriquePresidents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoriquePresidents|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriquePresidents|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriquePresidents[]    findAll()
 * @method HistoriquePresidents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriquePresidentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriquePresidents::class);
    }

    /**
     * @return HistoriquePresidents[]
     */
    public function findAllOrderByDate(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM historique_presidents h
            ORDER BY h.annee
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // /**
    //  * @return HistoriquePresidents[] Returns an array of HistoriquePresidents objects
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
    public function findOneBySomeField($value): ?HistoriquePresidents
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
