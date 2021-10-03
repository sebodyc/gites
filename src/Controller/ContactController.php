<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param CallApiService $call
     * @return Response
     */
    public function index(CallApiService $call): Response
    {
//       dd($call->getApi());
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
