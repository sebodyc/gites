<?php

namespace App\Controller;

use App\Entity\Photos;
use App\Form\PhotosType;
use App\Repository\PhotosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function index(Request $request,EntityManagerInterface $em){

        $form= $this->createForm(PhotosType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $photos = $form->getData();
            $em->persist($photos);
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/index.html.twig',[
            'photosForm'=>$form->createView()
        ]);

    }

    /**
     * @Route("/admin/mypics", name="mypics")
     * @param PhotosRepository $photosRepository
     * @return Response
     */
    public function myPics(PhotosRepository $photosRepository){
        $photos=$photosRepository->findAll();
        return $this->render('admin/mypics.html.twig',[
            'photos'=>$photos,
        ]);
    }


    /**
     * @Route("/admin/supprimer/{id<\d+>}", name="effacer")
     * @param Photos $photos
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Photos $photos,EntityManagerInterface $entityManager){

        $entityManager->remove($photos);

        $entityManager->flush();


        return $this->redirectToRoute('mypics');
    }



}
