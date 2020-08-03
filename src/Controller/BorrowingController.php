<?php

namespace App\Controller;

use App\Entity\Borrowing;
use App\Form\BorrowingType;
use App\Repository\BorrowingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use App\BorrowingService\LagManager;
use \DateInterval;

/**
 * @Route("/borrowing")
 */
class BorrowingController extends AbstractController
{
    /**
     * @Route("/", name="borrowing_index", methods={"GET"})
     * @param BorrowingRepository $borrowingRepository
     * @return Response
     */
    public function index(BorrowingRepository $borrowingRepository): Response
    {
        return $this->render('borrowing/index.html.twig', [
            'borrowings' => $borrowingRepository->findAll(),
        ]);
                    
    }
    /**
     * @Route("/new", name="borrowing_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $borrowing = new Borrowing();
        $form = $this->createForm(BorrowingType::class, $borrowing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $startDate = $request->request->get('borrowing')['startDate'];
            $startDate = date_create_from_format('Y-m-d', $startDate);
            $borrowing->setExpectedReturnDate($startDate->add(new DateInterval('P15D')));

            $entityManager->persist($borrowing);
            $entityManager->flush();

            return $this->redirectToRoute('borrowing_index');
        }

        return $this->render('borrowing/new.html.twig', [
            'borrowing' => $borrowing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="borrowing_show", methods={"GET"}, requirements={"id" = "\d+"})
     * @param Borrowing $borrowing
     * @return Response
     */
    public function show(Borrowing $borrowing): Response
    {
        return $this->render('borrowing/show.html.twig', [
            'borrowing' => $borrowing,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="borrowing_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Borrowing $borrowing
     * @return Response
     */
    public function edit(Request $request, Borrowing $borrowing): Response
    {
        $form = $this->createForm(BorrowingType::class, $borrowing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('borrowing_index');
        }

        return $this->render('borrowing/edit.html.twig', [
            'borrowing' => $borrowing,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="borrowing_delete", methods={"DELETE"})
     * @param Request $request
     * @param Borrowing $borrowing
     * @return Response
     */
    public function delete(Request $request, Borrowing $borrowing): Response
    {
        if ($this->isCsrfTokenValid('delete'.$borrowing->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($borrowing);
            $entityManager->flush();
        }

        return $this->redirectToRoute('borrowing_index');
    }

    /**
     * @Route("/email")
     * @param MailerInterface $mailer
     * @param LagManager $lagManager
     */
    public function send(MailerInterface $mailer, LagManager $lagManager)
    {
        $lagManager->late();


    }

}

  



