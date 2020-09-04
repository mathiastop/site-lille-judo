<?php

namespace App\Repository;

use App\Entity\InscriptionApresTexte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionApresTexte|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionApresTexte|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionApresTexte[]    findAll()
 * @method InscriptionApresTexte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionApresTexteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionApresTexte::class);
    }

    // /**
    //  * @return InscriptionApresTexte[] Returns an array of InscriptionApresTexte objects
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
    public function findOneBySomeField($value): ?InscriptionApresTexte
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
