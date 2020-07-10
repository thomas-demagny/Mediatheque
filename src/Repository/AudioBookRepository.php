<?php

namespace App\Repository;

use App\Entity\AudioBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AudioBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method AudioBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method AudioBook[]    findAll()
 * @method AudioBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AudioBookRepository extends ServiceEntityRepository
{
    /**
     * AudioBookRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AudioBook::class);
    }

    // /**
    //  * @return AudioBook[] Returns an array of AudioBook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AudioBook
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
