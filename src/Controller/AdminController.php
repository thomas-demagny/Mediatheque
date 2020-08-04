<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index()
    {
        //$returnDate = $this->getParameter('effective.return');

        return $this->render('admin/home/index.html.twig', [
            'controller_name' => 'AdminController',
            //$returnDate => 'effective.Return'
        ]);


    }
}
