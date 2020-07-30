<?php

namespace App\Controller;

use App\Entity\Participates;
use App\Form\ParticipatesType;
use App\Repository\ParticipatesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

/**
 * @Route("/participates")
 */
class ParticipatesController extends AbstractController
{
    /**
     * @Route("/", name="participates_index", methods={"GET"})
     * @param ParticipatesRepository $participatesRepository
     * @return Response
     */
    public function index(ParticipatesRepository $participatesRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $particpatesRepository->findAll(),
            $request->query->getInt('page', 1),
            5
        );
        
        return $this->render('participates/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="participates_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $participate = new Participates();
        $form = $this->createForm(ParticipatesType::class, $participate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participate);
            $entityManager->flush();

            return $this->redirectToRoute('participates_index');
        }

        return $this->render('participates/new.html.twig', [
            'participate' => $participate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="participates_show", methods={"GET"})
     * @param Participates $participate
     * @return Response
     */
    public function show(Participates $participate): Response
    {
        return $this->render('participates/show.html.twig', [
            'participate' => $participate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="participates_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Participates $participate
     * @return Response
     */
    public function edit(Request $request, Participates $participate): Response
    {
        $form = $this->createForm(ParticipatesType::class, $participate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('participates_index');
        }

        return $this->render('participates/edit.html.twig', [
            'participate' => $participate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="participates_delete", methods={"DELETE"})
     * @param Request $request
     * @param Participates $participate
     * @return Response
     */
    public function delete(Request $request, Participates $participate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$participate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($participate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('participates_index');
    }
}
