<?php

namespace App\Controller;

use App\Entity\AudioBook;
use App\Entity\Book;
use App\Entity\Cd;
use App\Entity\Creator;
use App\Entity\Dvd;
use App\Entity\Ebook;
use App\Entity\Journal;
use App\Entity\MeetUp;
use App\Form\AudioBookType;
use App\Form\BookType;
use App\Form\CdType;
use App\Form\CreatorType;
use App\Form\DvdType;
use App\Form\EbookType;
use App\Form\JournalType;
use App\Form\MeetUpType;
use App\Repository\AudioBookRepository;
use App\Repository\BookRepository;
use App\Repository\CdRepository;
use App\Repository\CreatorRepository;
use App\Repository\DvdRepository;
use App\Repository\EbookRepository;
use App\Repository\JournalRepository;
use App\Repository\MeetUpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/catalogue")
 */
class CatalogueController extends AbstractController {
    
    /**
     * @Route("/audio_book", name="audio_book_catalogue", methods={"GET"})
     * @param AudioBookRepository $audioBookRepository
     * @return Response
     */
    public function audioBookCatalogue(AudioBookRepository $audioBookRepository): Response {
        return $this->render('catalogue/audio_book-catalogue.html.twig', [
            'audio_books' => $audioBookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/audio_book/{id}", name="audio_book_show", methods={"GET"})
     * @param AudioBook $audioBook
     * @return Response
     */
    public function audioBookShow(AudioBook $audioBook): Response
    {
        return $this->render('catalogue/audio_book-show.html.twig', [
            'audio_book' => $audioBook,
        ]);
    }

    /**
     * @Route("/book", name="book_catalogue", methods={"GET"})
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function bookCatalogue(BookRepository $bookRepository): Response {
        return $this->render('catalogue/book-catalogue.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/book/{id}", name="book_show", methods={"GET"})
     * @param Book $book
     * @return Response
     */
    public function bookShow(Book $book): Response
    {
        return $this->render('catalogue/book-show.html.twig', [
            'book' => $book,
        ]);
    }
    
    /**
     * @Route("/cd", name="cd_catalogue", methods={"GET"})
     * @param CdRepository $cdRepository
     * @return Response
     */
    public function cdCatalogue(CdRepository $CdRepository): Response {
        return $this->render('catalogue/cd-catalogue.html.twig', [
            'cds' => $CdRepository->findAll(),
        ]);
    }

    /**
     * @Route("/cd/{id}", name="cd_show", methods={"GET"})
     * @param Cd $cd
     * @return Response
     */
    public function cdShow(Cd $cd): Response
    {
        return $this->render('catalogue/cd-show.html.twig', [
            'cd' => $cd,
        ]);
    }
    
    /**
     * @Route("/creator", name="creator_catalogue", methods={"GET"})
     * @param CreatorRepository $creatorRepository
     * @return Response
     */
    public function creatorCatalogue(CreatorRepository $creatorRepository): Response {
        return $this->render('catalogue/creator-catalogue.html.twig', [
            'creators' => $creatorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/creator/{id}", name="creator_show", methods={"GET"})
     * @param Creator $creator
     * @return Response
     */
    public function creatorShow(Creator $creator): Response
    {
        return $this->render('catalogue/creator-show.html.twig', [
            'creator' => $creator,
        ]);
    }
    
    /**
     * @Route("/dvd", name="dvd_catalogue", methods={"GET"})
     * @param DvdRepository $dvdRepository
     * @return Response
     */
    public function dvdCatalogue(DvdRepository $dvdRepository): Response {
        return $this->render('catalogue/dvd-catalogue.html.twig', [
            'dvds' => $dvdRepository->findAll(),
        ]);
    }

    /**
     * @Route("/dvd/{id}", name="dvd_show", methods={"GET"})
     * @param Dvd $dvd
     * @return Response
     */
    public function dvdShow(Dvd $dvd): Response
    {
        return $this->render('catalogue/dvd-show.html.twig', [
            'dvd' => $dvd,
        ]);
    }
    
    /**
     * @Route("/ebook", name="ebook_catalogue", methods={"GET"})
     * @param EbookRepository $ebookRepository
     * @return Response
     */
    public function ebookCatalogue(EBookRepository $ebookRepository): Response {
        return $this->render('catalogue/ebook-catalogue.html.twig', [
            'ebooks' => $ebookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ebook/{id}", name="ebook_show", methods={"GET"})
     * @param Ebook $ebook
     * @return Response
     */
    public function ebookShow(Ebook $ebook): Response
    {
        return $this->render('catalogue/ebook-show.html.twig', [
            'ebook' => $ebook,
        ]);
    }
    
    /**
     * @Route("/journal", name="journal_catalogue", methods={"GET"})
     * @param JournalRepository $journalRepository
     * @return Response
     */
    public function journalCatalogue(JournalRepository $journalRepository): Response {
        return $this->render('catalogue/journal-catalogue.html.twig', [
            'journals' => $journalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/journal/{id}", name="journal_show", methods={"GET"})
     * @param Journal $journal
     * @return Response
     */
    public function journalShow(Journal $journal): Response
    {
        return $this->render('catalogue/journal-show.html.twig', [
            'journal' => $journal,
        ]);
    }
    
    /**
     * @Route("/meet_up", name="meet_up_catalogue", methods={"GET"})
     * @param MeetUpRepository $meetUpRepository
     * @return Response
     */
    public function meetUpCatalogue(MeetUpRepository $meetUpRepository): Response {
        return $this->render('catalogue/meet_up-catalogue.html.twig', [
            'meet_ups' => $meetUpRepository->findAll(),
        ]);
    }

    /**
     * @Route("/meet_up/{id}", name="meet_up_show", methods={"GET"})
     * @param MeetUp $meetUp
     * @return Response
     */
    public function meetUpShow(MeetUp $meetUp): Response
    {
        return $this->render('catalogue/meet_up-show.html.twig', [
            'meet_up' => $meetUp,
        ]);
    }
}
