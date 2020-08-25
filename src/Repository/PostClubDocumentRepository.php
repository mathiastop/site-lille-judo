<?php

namespace App\Repository;

use App\Entity\PostClubDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostClubDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostClubDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostClubDocument[]    findAll()
 * @method PostClubDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostClubDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostClubDocument::class);
    }

    // /**
    //  * @return PostClubDocument[] Returns an array of PostClubDocument objects
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
    public function findOneBySomeField($value): ?PostClubDocument
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
