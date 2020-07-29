<?php

namespace App\Repository;

use App\Entity\Borrowing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Borrowing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Borrowing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Borrowing[]    findAll()
 * @method Borrowing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BorrowingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Borrowing::class);
    }

    // /**
    //  * @return Borrowing[] Returns an array of Borrowing objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function productMostBorrow(): ?array //car group by fait un tableau
    {
        $borrow = $this->createQueryBuilder('b')

            ->select('count(b) as total','p.id', 'p.title')
            ->join('b.document', 'p')
            ->groupBy('p.id')
            ->setMaxResults(5)
            ->orderBy('total', 'desc')
            ->getQuery();

            
           return $borrow->getResult();
        ;
    }

    public function expectedReturnDate(): ?array
    {
        $date= $this->createQueryBuilder('c')

        ->select('c.expectedReturnDate','p.id', 'p.title', 'm.email', 'm.lastName')
        ->where('c.expectedReturnDate < CURRENT_DATE()')
        ->join('c.borrower', 'm')
        ->join('c.document', 'p')
        ->orderBy('c.expectedReturnDate', 'asc')
        ->getQuery();

        
       return $date->getResult();
    ;
    }

    public function warningReturn()
    {
        $dateClose= $this->createQueryBuilder('d')

        ->select('d.expectedReturnDate','p.id', 'p.title', 'm.email', 'm.lastName')
        ->where('DATESUB(c.expectedReturnDate, 2, "DAY")')
        ->join('c.borrower', 'm')
        ->join('c.document', 'p')
        ->orderBy('c.expectedReturnDate', 'asc')
        ->getQuery();

    }
    
}
