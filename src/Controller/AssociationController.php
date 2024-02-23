<?php

namespace App\Controller;

use App\Entity\Association;
use App\Form\AssociationType;
use App\Repository\AssociationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AssociationController extends AbstractController
{
    #[Route('/association', name: 'app_association')]
    public function index(): Response
    {
        return $this->render('association/index.html.twig', [
            'controller_name' => 'AssociationController',
        ]);
    }
    #[Route('/afficherassociation', name: 'app_afficherassociation')]
    public function afficherdon(AssociationRepository $x): Response
    {
        $associations=$x->findAll();
        return $this->render('association/afficherassociation.html.twig', [
            'association' => $associations,
        ]);
        return $this->redirectToRoute('app_afficherByidassociation');
    }


    #[Route('/ajouterassociation', name: 'app_ajouterassociation')]
    public function ajouterassociation(ManagerRegistry $managerRegistry, Request $req): Response
    {
        $em = $managerRegistry->getManager();
        $association = new Association();
        $form = $this->createForm(AssociationType::class,$association);
        $form->handleRequest($req);
        if ($form->isSubmitted() and $form->isValid()) {

            $em->persist($association);
            $em->flush();
            return $this->redirectToRoute('app_afficherassociation');
            
        }
        return $this->renderForm('association/ajouterassociation.html.twig', [
            'f' => $form
        ]);
    }



    #[Route('/supprimerassociation/{id}', name: 'app_supprimerassociation')]
    public function supprimerdon($id,AssociationRepository $associationRepository,ManagerRegistry $managerRegistry): Response {
        
    $em = $managerRegistry->getManager();
        $dataid = $associationRepository->find($id);
        $em->remove($dataid);
        $em->flush();
        return $this->redirectToRoute('app_afficherassociation');
       
    }


    #[Route('/modifierassociation/{id}', name: 'app_modifierassociation')]
    public function modifierassociation($id, AssociationRepository $associationRepository, Request $req, ManagerRegistry $managerRegistry): Response
    {
        $em = $managerRegistry->getManager();
        $dataid = $associationRepository->find($id);
        $form = $this->createForm(AssociationType::class, $dataid);
        $form->handleRequest($req);
        if ($form->isSubmitted() and $form->isValid()) {
            $em->persist($dataid);
            $em->flush();
            return $this->redirectToRoute('app_afficherassociation');
        }

        return $this->renderForm('association/modifierassociation.html.twig', [
            'f' => $form
        ]);
    }


    #[Route('/afficherByidassociation/{id}', name: 'app_afficherByidassociation')]
    public function afficherByidassociation($id): Response
    {
        // Assuming you're using Doctrine to retrieve data
        $association = $this->getDoctrine()
            ->getRepository(Association::class)
            ->find($id);
    
        if (!$association) {
            throw $this->createNotFoundException("Don not found for id {$id}");
        }
    
        return $this->render('association/afficherByidassociation.html.twig', [
            'association' => $association
        ]);
    }

}
