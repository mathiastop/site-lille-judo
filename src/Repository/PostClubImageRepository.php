<?php

namespace App\Repository;

use App\Entity\PostClubImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostClubImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostClubImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostClubImage[]    findAll()
 * @method PostClubImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostClubImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostClubImage::class);
    }

    // /**
    //  * @return PostClubImage[] Returns an array of PostClubImage objects
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
    public function findOneBySomeField($value): ?PostClubImage
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
