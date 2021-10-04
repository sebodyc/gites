<?php

namespace App\Controller;

use App\Form\PhotosType;
use App\Repository\PhotosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotosController extends AbstractController
{
//    /**
//     * @Route("/photos", name="photos")
//     * @param PhotosRepository $photosRepository
//     * @return Response
//     */
//    public function index(PhotosRepository $photosRepository): Response
//    {
//        $photos= $photosRepository->findAll();
//        return $this->render('photos/index.html.twig', [
//            'photos' => $photos,
//        ]);
//    }

//    /**
//     * @Route("/photos/create", name="photos_create")
//     * @param Request $request
//     * @param EntityManagerInterface $em
//     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
//     */
//    public function createPhotos(Request $request,EntityManagerInterface $em){
//
//        $form= $this->createForm(PhotosType::class);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted()){
//            $photos = $form->getData();
//            $em->persist($photos);
//            $em->flush();
//
//            return $this->redirectToRoute('photos');
//        }
//
//        return $this->render('photos/create.html.twig',[
//            'photosForm'=>$form->createView()
//        ]);
//
//    }
}
