<?php

namespace App\Repository;

use App\Entity\InscriptionApresPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionApresPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionApresPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionApresPhoto[]    findAll()
 * @method InscriptionApresPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionApresPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionApresPhoto::class);
    }

    // /**
    //  * @return InscriptionApresPhoto[] Returns an array of InscriptionApresPhoto objects
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
    public function findOneBySomeField($value): ?InscriptionApresPhoto
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
