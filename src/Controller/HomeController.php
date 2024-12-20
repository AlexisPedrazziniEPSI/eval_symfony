<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\MarquesAjoutType;
use App\Form\MarquesModifType;
use App\Form\MarquesSuppType;
use App\Repository\MarquesRepository;
use App\Entity\Marques;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'marques' => $entityManager->getRepository(Marques::class)->findAll(),
        ]);
    }

    #[Route('/ajout', name: 'app_ajout')]
    public function ajout(Request $request, EntityManagerInterface $entityManager): Response
    {
        $marque = new Marques();
        $form = $this->createForm(MarquesAjoutType::class, $marque);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $marque = $form->getData();
            $entityManager->persist($marque);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/ajout.html.twig', [
            'marque' => $marque,
            'form' => $form,
        ]);
    }
}
