<?php

namespace App\Repository;

use App\Entity\InscriptionAvantCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InscriptionAvantCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionAvantCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionAvantCategorie[]    findAll()
 * @method InscriptionAvantCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionAvantCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionAvantCategorie::class);
    }

    public function findAllExceptThisOrder($int)
    {
        return $this->createQueryBuilder('inscriptionAvantCategorie')
            ->andWhere('inscriptionAvantCategorie.ordre != :int')
            ->orderBy('inscriptionAvantCategorie.ordre', 'ASC')
            ->setParameter('int', $int)
            ->getQuery()
            ->execute();
    }
    // /**
    //  * @return InscriptionAvantCategorie[] Returns an array of InscriptionAvantCategorie objects
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
    public function findOneBySomeField($value): ?InscriptionAvantCategorie
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
