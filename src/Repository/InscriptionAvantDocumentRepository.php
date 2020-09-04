<?php

namespace App\Repository;

use App\Entity\InscriptionAvantDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionAvantDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionAvantDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionAvantDocument[]    findAll()
 * @method InscriptionAvantDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionAvantDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionAvantDocument::class);
    }

    // /**
    //  * @return InscriptionAvantDocument[] Returns an array of InscriptionAvantDocument objects
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
    public function findOneBySomeField($value): ?InscriptionAvantDocument
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
