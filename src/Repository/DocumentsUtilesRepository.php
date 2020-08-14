<?php

namespace App\Repository;

use App\Entity\DocumentsUtiles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentsUtiles|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentsUtiles|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentsUtiles[]    findAll()
 * @method DocumentsUtiles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentsUtilesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentsUtiles::class);
    }

    // /**
    //  * @return DocumentsUtiles[] Returns an array of DocumentsUtiles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentsUtiles
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
