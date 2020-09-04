<?php

namespace App\Repository;

use App\Entity\InscriptionAvantTexte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionAvantTexte|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionAvantTexte|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionAvantTexte[]    findAll()
 * @method InscriptionAvantTexte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionAvantTexteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionAvantTexte::class);
    }

    // /**
    //  * @return InscriptionAvantTexte[] Returns an array of InscriptionAvantTexte objects
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
    public function findOneBySomeField($value): ?InscriptionAvantTexte
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
