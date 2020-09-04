<?php

namespace App\Repository;

use App\Entity\InscriptionPendantTexte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionPendantTexte|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionPendantTexte|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionPendantTexte[]    findAll()
 * @method InscriptionPendantTexte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionPendantTexteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionPendantTexte::class);
    }

    // /**
    //  * @return InscriptionPendantTexte[] Returns an array of InscriptionPendantTexte objects
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
    public function findOneBySomeField($value): ?InscriptionPendantTexte
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
