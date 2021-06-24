<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndustriesController extends AbstractController
{
    /**
     * @Route("/industries", name="industries")
     */
    public function index(): Response
    {
        return $this->render('industries/index.html.twig', [
            'controller_name' => 'IndustriesController',
        ]);
    }
}
