<?php

namespace App\Repository;

use App\Entity\PhotosPassagesGrades;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PhotosPassagesGrades|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotosPassagesGrades|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotosPassagesGrades[]    findAll()
 * @method PhotosPassagesGrades[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotosPassagesGradesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotosPassagesGrades::class);
    }

    // /**
    //  * @return PhotosPassagesGrades[] Returns an array of PhotosPassagesGrades objects
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
    public function findOneBySomeField($value): ?PhotosPassagesGrades
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
