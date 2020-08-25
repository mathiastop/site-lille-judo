<?php

namespace App\Repository;

use App\Entity\PostNatioDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostNatioDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostNatioDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostNatioDocument[]    findAll()
 * @method PostNatioDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostNatioDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostNatioDocument::class);
    }

    // /**
    //  * @return PostNatioDocument[] Returns an array of PostNatioDocument objects
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
    public function findOneBySomeField($value): ?PostNatioDocument
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
