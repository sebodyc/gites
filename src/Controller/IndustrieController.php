<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndustrieController extends AbstractController
{
    /**
     * @Route("/industrie", name="industrie")
     */
    public function index(): Response
    {
        return $this->render('industrie/index.html.twig', [
            'controller_name' => 'IndustrieController',
        ]);
    }
}
