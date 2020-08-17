<?php

namespace App\Repository;

use App\Entity\HistoriqueClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoriqueClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueClub[]    findAll()
 * @method HistoriqueClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueClub::class);
    }

    /**
     * @return HistoriqueClub[]
     */
    public function findAllOrderByDate(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT *
            FROM historique_club h
            WHERE h.enabled IS true
            ORDER BY h.annee
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    // /**
    //  * @return HistoriqueClub[] Returns an array of HistoriqueClub objects
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
    public function findOneBySomeField($value): ?HistoriqueClub
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
