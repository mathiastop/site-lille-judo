<?php

namespace App\Repository;

use App\Entity\InscriptionAvantPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionAvantPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionAvantPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionAvantPhoto[]    findAll()
 * @method InscriptionAvantPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionAvantPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionAvantPhoto::class);
    }

    // /**
    //  * @return InscriptionAvantPhoto[] Returns an array of InscriptionAvantPhoto objects
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
    public function findOneBySomeField($value): ?InscriptionAvantPhoto
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
