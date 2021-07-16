<?php

namespace App\Controller;

use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticulierController extends AbstractController
{
    /**
     * @Route("/particulier", name="particulier")
     * @param PhotosRepository $photosRepository
     * @return Response
     */
    public function index(PhotosRepository $photosRepository): Response
    {

        $photos= $photosRepository->findAll();
        $portail= $photosRepository->findBy(array('type' => 'portail'));
        $pergola= $photosRepository->findBy(array('type'=>'pergola'));
        $verriere= $photosRepository->findBy(array('type'=>'verriere'));
        $grille= $photosRepository->findBy(array('type'=>'grille'));
        $escalier= $photosRepository->findBy(array('type'=>'escalier'));
        $gardeCorps= $photosRepository->findBy(array('type'=>'garde'));

        return $this->render('particulier/index.html.twig', [
            'photos' => $photos,
            'portails'=> $portail,
            'pergolas'=> $pergola,
            'verrieres'=>$verriere,
            'grilles'=>$grille,
            'escaliers'=>$escalier,
            'gardeCorps'=>$gardeCorps,
        ]);
    }
}
