<?php

namespace App\Controller;

use App\Form\ActiviteesType;
use App\Form\PrestationType;
use App\Repository\ActiviteesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActiviteController extends AbstractController
{
    /**
     * @Route("/activite", name="activite")
     * @param ActiviteesRepository $activiteesRepository
     * @return Response
     */
    public function index(ActiviteesRepository $activiteesRepository): Response
    {
        $activitees= $activiteesRepository->findAll();
        $activiteSport =$activiteesRepository->findBy(array('categories' => 'sport'));
        $activiteBalades =$activiteesRepository->findBy(array('categories' => 'balades'));
        $activiteGastronomie =$activiteesRepository->findBy(array('categories' => 'gastronomie'));

        return $this->render('activite/index.html.twig', [
            'activiteSport' =>$activiteSport ,
            'activiteBalades'=>$activiteBalades,
            'activiteGastronomie'=>$activiteGastronomie
        ]);
    }



    /**
     * @Route("/activite/create", name="activite_create")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */
    public function createPrestation(Request $request, EntityManagerInterface $em){

        $form = $this->createForm(ActiviteesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $activitees = $form->getData();
            $em->persist($activitees);
            $em->flush();

            return $this->redirectToRoute('activite');
        }

        return $this->render('activite/create.html.twig',[
            'activiteForm'=>$form->createView()
        ]);

    }
}
