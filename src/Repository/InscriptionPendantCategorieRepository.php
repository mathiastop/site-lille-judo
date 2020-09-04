<?php

namespace App\Repository;

use App\Entity\InscriptionPendantCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionPendantCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionPendantCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionPendantCategorie[]    findAll()
 * @method InscriptionPendantCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionPendantCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionPendantCategorie::class);
    }

    public function findAllExceptThisOrder($int)
    {
        return $this->createQueryBuilder('inscriptionPendantCategorie')
            ->andWhere('inscriptionPendantCategorie.ordre != :int')
            ->orderBy('inscriptionPendantCategorie.ordre', 'ASC')
            ->setParameter('int', $int)
            ->getQuery()
            ->execute();
    }
    // /**
    //  * @return InscriptionPendantCategorie[] Returns an array of InscriptionPendantCategorie objects
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
    public function findOneBySomeField($value): ?InscriptionPendantCategorie
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
