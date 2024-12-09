<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\AquariumAjoutType;
use App\Form\AquariumModifType;
use App\Form\AquariumSuppType;
use App\Repository\MarquesRepository;
use App\Entity\Marques;
use App\Entity\Aquarium;
use App\Repository\AquariumRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class MarqueController extends AbstractController
{
    #[Route('/marque{id}', name: 'app_marque', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, Marques $marque): Response
    {
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
            'marque' => $marque,
        ]);
    }

    #[Route('/marque/ajout', name: 'ajout_aquarium', methods: ['GET', 'POST'])]
    public function ajoutAquarium(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marque = new Marques();
        $form = $this->createForm(AquariumAjoutType::class, $marque);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $marque = $form->getData();
            $entityManager->persist($marque);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('marque/ajout.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }
}
