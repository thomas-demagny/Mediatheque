<?php

namespace App\Controller;

use App\Entity\Dvd;
use App\Form\DvdType;
use App\Repository\DvdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/dvd")
 */
class DvdController extends AbstractController
{
    /**
     * @Route("/", name="dvd_index", methods={"GET"})
     * @param DvdRepository $dvdRepository
     * @return Response
     */
    public function index(DvdRepository $dvdRepository): Response
    {
        return $this->render('admin/dvd/index.html.twig', [
            'dvds' => $dvdRepository->findAll(),
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

        return $this->render('admin/dvd/new.html.twig', [
            'dvd' => $dvd,
            'form' => $form->createView(),
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

        return $this->render('admin/dvd/edit.html.twig', [
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
