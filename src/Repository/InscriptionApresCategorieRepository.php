<?php

namespace App\Repository;

use App\Entity\InscriptionApresCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionApresCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionApresCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionApresCategorie[]    findAll()
 * @method InscriptionApresCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionApresCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionApresCategorie::class);
    }

    public function findAllExceptThisOrder($int)
    {
        return $this->createQueryBuilder('inscriptionApresCategorie')
            ->andWhere('inscriptionApresCategorie.ordre != :int')
            ->orderBy('inscriptionApresCategorie.ordre', 'ASC')
            ->setParameter('int', $int)
            ->getQuery()
            ->execute();
    }
    // /**
    //  * @return InscriptionApresCategorie[] Returns an array of InscriptionApresCategorie objects
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
    public function findOneBySomeField($value): ?InscriptionApresCategorie
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
