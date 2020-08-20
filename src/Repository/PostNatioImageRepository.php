<?php

namespace App\Repository;

use App\Entity\PostNatioImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostNatioImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostNatioImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostNatioImage[]    findAll()
 * @method PostNatioImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostNatioImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostNatioImage::class);
    }

    // /**
    //  * @return PostNatioImage[] Returns an array of PostNatioImage objects
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
    public function findOneBySomeField($value): ?PostNatioImage
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
