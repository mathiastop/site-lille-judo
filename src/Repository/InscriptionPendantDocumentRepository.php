<?php

namespace App\Repository;

use App\Entity\InscriptionPendantDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionPendantDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionPendantDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionPendantDocument[]    findAll()
 * @method InscriptionPendantDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionPendantDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionPendantDocument::class);
    }

    // /**
    //  * @return InscriptionPendantDocument[] Returns an array of InscriptionPendantDocument objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InscriptionPendantDocument
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
