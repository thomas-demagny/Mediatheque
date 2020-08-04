<?php

namespace App\Controller;

use App\Entity\Ebook;
use App\Form\EbookType;
use App\Repository\EbookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/ebook")
 */
class EbookController extends AbstractController
{
    /**
     * @Route("/", name="ebook_index", methods={"GET"})
     * @param EbookRepository $ebookRepository
     * @return Response
     */
    public function index(EbookRepository $ebookRepository): Response
    {
        return $this->render('admin/ebook/index.html.twig', [
            'ebooks' => $ebookRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ebook_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $ebook = new Ebook();
        $form = $this->createForm(EbookType::class, $ebook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ebook);
            $entityManager->flush();

            return $this->redirectToRoute('ebook_index');
        }

        return $this->render('admin/ebook/new.html.twig', [
            'ebook' => $ebook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ebook_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Ebook $ebook
     * @return Response
     */
    public function edit(Request $request, Ebook $ebook): Response
    {
        $form = $this->createForm(EbookType::class, $ebook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ebook_index');
        }

        return $this->render('admin/ebook/edit.html.twig', [
            'ebook' => $ebook,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ebook_delete", methods={"DELETE"})
     * @param Request $request
     * @param Ebook $ebook
     * @return Response
     */
    public function delete(Request $request, Ebook $ebook): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ebook->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ebook);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ebook_index');
    }
}
