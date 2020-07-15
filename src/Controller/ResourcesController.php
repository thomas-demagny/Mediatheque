<?php

namespace App\Controller;

use App\Entity\Resources;
use App\Form\ResourcesType;
use App\Repository\ResourcesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resources")
 */
class ResourcesController extends AbstractController
{
    /**
     * @Route("/", name="resources_index", methods={"GET"})
     */
    public function index(ResourcesRepository $resourcesRepository): Response
    {
        return $this->render('resources/index.html.twig', [
            'resources' => $resourcesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="resources_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resource = new Resources();
        $form = $this->createForm(ResourcesType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resource);
            $entityManager->flush();

            return $this->redirectToRoute('resources_index');
        }

        return $this->render('resources/new.html.twig', [
            'resource' => $resource,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resources_show", methods={"GET"})
     */
    public function show(Resources $resource): Response
    {
        return $this->render('resources/show.html.twig', [
            'resource' => $resource,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="resources_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Resources $resource): Response
    {
        $form = $this->createForm(ResourcesType::class, $resource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resources_index');
        }

        return $this->render('resources/edit.html.twig', [
            'resource' => $resource,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resources_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Resources $resource): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resource->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resource);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resources_index');
    }
}
