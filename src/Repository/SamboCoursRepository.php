<?php

namespace App\Repository;

use App\Entity\SamboCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SamboCours>
 *
 * @method SamboCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method SamboCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method SamboCours[]    findAll()
 * @method SamboCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SamboCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SamboCours::class);
    }

    public function findAllExceptThisOrder($int)
    {
        return $this->createQueryBuilder('dojo')
            ->andWhere('dojo.ordre != :int')
            ->orderBy('dojo.ordre', 'ASC')
            ->setParameter('int', $int)
            ->getQuery()
            ->execute();
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SamboCours $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(SamboCours $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SamboCours[] Returns an array of SamboCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SamboCours
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
