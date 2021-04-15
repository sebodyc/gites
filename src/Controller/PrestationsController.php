<?php

namespace App\Controller;

use App\Form\PrestationType;
use App\Repository\PrestationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationsController extends AbstractController
{
    /**
     * classe qui permet de trouver toutes les prestations presente dans la bd
     * @Route("/prestations", name="prestations")
     * @param PrestationsRepository $prestationsRepository
     * @return Response
     */
    public function index(PrestationsRepository $prestationsRepository): Response
    {
        $prestations = $prestationsRepository->findAll();

        return $this->render('prestations/index.html.twig', [
            'prestations' => $prestations,
        ]);
    }

    /**
     * @Route("/prestations/create", name="prestations_create")
     *
     *
     *
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return RedirectResponse|Response
     */
    public function createPrestation(Request $request, EntityManagerInterface $em){

        $form = $this->createForm(PrestationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $prestation = $form->getData();
            $em->persist($prestation);
            $em->flush();

            return $this->redirectToRoute('prestations');
        }

        return $this->render('prestations/create.html.twig',[
            'prestationForm'=>$form->createView()
        ]);

    }
}
