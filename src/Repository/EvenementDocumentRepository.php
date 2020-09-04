<?php

namespace App\Repository;

use App\Entity\EvenementDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EvenementDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvenementDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvenementDocument[]    findAll()
 * @method EvenementDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvenementDocument::class);
    }

    // /**
    //  * @return EvenementDocument[] Returns an array of EvenementDocument objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EvenementDocument
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
