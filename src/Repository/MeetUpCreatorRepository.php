<?php

namespace App\Repository;

use App\Entity\MeetUpCreator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MeetUpCreator|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeetUpCreator|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeetUpCreator[]    findAll()
 * @method MeetUpCreator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetUpCreatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeetUpCreator::class);
    }

    // /**
    //  * @return MeetUpCreator[] Returns an array of MeetUpCreator objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MeetUpCreator
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
