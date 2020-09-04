<?php

namespace App\Repository;

use App\Entity\InscriptionPendantPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionPendantPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionPendantPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionPendantPhoto[]    findAll()
 * @method InscriptionPendantPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionPendantPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionPendantPhoto::class);
    }

    // /**
    //  * @return InscriptionPendantPhoto[] Returns an array of InscriptionPendantPhoto objects
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
    public function findOneBySomeField($value): ?InscriptionPendantPhoto
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
