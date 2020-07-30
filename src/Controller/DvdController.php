<?php

namespace App\Controller;

use App\Entity\Dvd;
use App\Form\DvdType;
use App\Repository\DvdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

/**
 * @Route("/dvd")
 */
class DvdController extends AbstractController
{
    /**
     * @Route("/", name="dvd_index", methods={"GET"})
     * @param DvdRepository $dvdRepository
     * @return Response
     */
    public function index(DvdRepository $dvdRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $dvdRepository->findAll(),
            $request->query->getInt('page', 1),
            5
        );
        
        return $this->render('dvd/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="dvd_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $dvd = new Dvd();
        $form = $this->createForm(DvdType::class, $dvd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dvd);
            $entityManager->flush();

            return $this->redirectToRoute('dvd_index');
        }

        return $this->render('dvd/new.html.twig', [
            'dvd' => $dvd,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dvd_show", methods={"GET"})
     * @param Dvd $dvd
     * @return Response
     */
    public function show(Dvd $dvd): Response
    {
        return $this->render('dvd/show.html.twig', [
            'dvd' => $dvd,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dvd_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Dvd $dvd
     * @return Response
     */
    public function edit(Request $request, Dvd $dvd): Response
    {
        $form = $this->createForm(DvdType::class, $dvd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dvd_index');
        }

        return $this->render('dvd/edit.html.twig', [
            'dvd' => $dvd,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dvd_delete", methods={"DELETE"})
     * @param Request $request
     * @param Dvd $dvd
     * @return Response
     */
    public function delete(Request $request, Dvd $dvd): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dvd->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dvd);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dvd_index');
    }
}
