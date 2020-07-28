<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Repository\EbookRepository;
use App\Repository\BorrowingRepository;
use Symfony\Component\HttpFoundation\Response;


class StatisticsController extends AbstractController
{
    /**
     * @Route("/statistics", name="statistics")
     */
    public function index()
    {
        return $this->render('statistics/index.html.twig', [
            'controller_name' => 'StatisticsController',
        ]);
    }

    /**
     * @Route("/lastbook", name="book_last", methods={"GET"})
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function last(BookRepository $bookRepository): Response
    {
        $lastBook = $bookRepository->lastBook(5);

        
        return $this->render('statistics/lastBooks/index.html.twig', [
            'books' => $lastBook
        ]);
    }


    /**
     * @Route("/lastebook", name="ebook_last", methods={"GET"})
     * @param EbookRepository $ebookRepository
     * @return Response
     */
    public function ShowLastEbook(EbookRepository $ebookRepository): Response
    {
        $lastEBook = $ebookRepository->lastEBook(5);

        
        return $this->render('statistics/lastEbook/index.html.twig', [
            'ebooks' => $lastEBook
        ]);
    }


    /**
     * @Route("/mostborrow", name="productborrow", methods={"GET"})
     * @param BorrowingRepository $borrowingRepository
     * @return Response
     */
    public function ShowMostBorrow(BorrowingRepository $borrowingRepository): Response
    {
        $borrows = $borrowingRepository->productMostBorrow();

        
        return $this->render('statistics/mostBorrow/index.html.twig', [
            'borrows' => $borrows
        ]);
    }

    /**
     * @Route("/limitdate", name="limitDate", methods={"GET"})
     * @param BorrowingRepository $borrowingRepository
     * @return Response
     */
    public function LimitDate(BorrowingRepository $borrowingRepository): Response
    {
        $dates = $borrowingRepository->expectedReturnDate();

        return $this->render('statistics/dateLimit/index.html.twig', [
            'dates' => $dates
        ]);
    }
 
}
