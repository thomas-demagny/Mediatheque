<?php

namespace App\Controller;

use App\Entity\AudioBook;
use App\Form\AudioBook1Type;
use App\Repository\AudioBookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/audio/book")
 */
class AudioBookController extends AbstractController
{
    /**
     * @Route("/", name="audio_book_index", methods={"GET"})
     * @param AudioBookRepository $audioBookRepository
     * @return Response
     */
    public function index(AudioBookRepository $audioBookRepository): Response
    {
        return $this->render('audio_book/index.html.twig', [
            'audio_books' => $audioBookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="audio_book_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $audioBook = new AudioBook();
        $form = $this->createForm(AudioBookType::class, $audioBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($audioBook);
            $entityManager->flush();

            return $this->redirectToRoute('audio_book_index');
        }

        return $this->render('audio_book/new.html.twig', [
            'audio_book' => $audioBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="audio_book_show", methods={"GET"})
     * @param AudioBook $audioBook
     * @return Response
     */
    public function show(AudioBook $audioBook): Response
    {
        return $this->render('audio_book/show.html.twig', [
            'audio_book' => $audioBook,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="audio_book_edit", methods={"GET","POST"})
     * @param Request $request
     * @param AudioBook $audioBook
     * @return Response
     */
    public function edit(Request $request, AudioBook $audioBook): Response
    {
        $form = $this->createForm(AudioBook1Type::class, $audioBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('audio_book_index');
        }

        return $this->render('audio_book/edit.html.twig', [
            'audio_book' => $audioBook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="audio_book_delete", methods={"DELETE"})
     * @param Request $request
     * @param AudioBook $audioBook
     * @return Response
     */
    public function delete(Request $request, AudioBook $audioBook): Response
    {
        if ($this->isCsrfTokenValid('delete'.$audioBook->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($audioBook);
            $entityManager->flush();
        }

        return $this->redirectToRoute('audio_book_index');
    }
}
