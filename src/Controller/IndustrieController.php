<?php

namespace App\Controller;

use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndustrieController extends AbstractController
{
    /**
     * @Route("/industrie", name="industrie")
     * @param PhotosRepository $photosRepository
     * @return Response
     */
    public function index(PhotosRepository $photosRepository): Response
    {
        $photos = $photosRepository->findBy(array('category' => 'pro'));

        return $this->render('industrie/index.html.twig', [
            'photos' => $photos,
        ]);
    }
}
