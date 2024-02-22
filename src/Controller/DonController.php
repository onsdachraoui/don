<?php

namespace App\Controller;

use App\Entity\Don;
use App\Form\DonType;
use App\Repository\DonRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DonController extends AbstractController
{
    #[Route('/don', name: 'app_don')]
    public function index(): Response
    {
        return $this->render('don/index.html.twig', [
            'controller_name' => 'DonController',
        ]);
    }

    #[Route('/afficherdon', name: 'app_afficherdon')]
    public function afficherdon(DonRepository $x): Response
    {
        $dons=$x->findAll();
        return $this->render('don/afficherdon.html.twig', [
            'don' => $dons,
        ]);
        return $this->redirectToRoute('app_afficherByiddon');
    }

    #[Route('/ajouterdon', name: 'app_ajouterdon')]
    public function ajouterdon(ManagerRegistry $managerRegistry, Request $req): Response
    {
        $em = $managerRegistry->getManager();
        $don = new Don();
        $form = $this->createForm(DonType::class, $don);
        $form->handleRequest($req);

        if ($form->isSubmitted() and $form->isValid()) {

            $em->persist($don);
            $em->flush();
           
           
            return $this->redirectToRoute('app_ajouterdon');
        }
        return $this->renderForm('don/ajouterdon.html.twig', [
            'f' => $form
        ]);
    }

    #[Route('/supprimerdon/{id}', name: 'app_supprimerdon')]
    public function supprimerdon($id,DonRepository $donRepository,ManagerRegistry $managerRegistry): Response {
        
    $em = $managerRegistry->getManager();
        $dataid = $donRepository->find($id);
        $em->remove($dataid);
        $em->flush();
        return $this->redirectToRoute('app_afficherdon');
       
    }


    #[Route('/modifierdon/{id}', name: 'app_modifierdon')]
    public function modifierdon($id, DonRepository $donRepository, Request $req, ManagerRegistry $managerRegistry): Response
    {
        $em = $managerRegistry->getManager();
        $dataid = $donRepository->find($id);
        $form = $this->createForm(DonType::class, $dataid);
        $form->handleRequest($req);
        if ($form->isSubmitted() and $form->isValid()) {
            $em->persist($dataid);
            $em->flush();
            return $this->redirectToRoute('app_afficherdon');
        }

        return $this->renderForm('don/modifierdon.html.twig', [
            'x' => $form
        ]);
    }


    #[Route('/afficherByiddon/{id}', name: 'app_afficherByiddon')]
    public function afficherByiddon($id): Response
    {
        // Assuming you're using Doctrine to retrieve data
        $don = $this->getDoctrine()
            ->getRepository(Don::class)
            ->find($id);
    
        if (!$don) {
            throw $this->createNotFoundException("Don not found for id {$id}");
        }
    
        return $this->render('don/afficherByiddon.html.twig', [
            'don' => $don
        ]);
    }

}

