<?php

namespace App\Controller;

use DateTime;
use App\Entity\Commande;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        return $this->render('cart/index.html.twig');
    }

    // #[Route('/cart/commandes', name: 'commandes')]
    // public function commande(EntityManagerInterface $manager, Request $request): Response {

    //     $commande = new Commande;
    //     dd($request->request);
    //     $commande->setChambre($chambre)
    //             ->setPrixTotal($prix_total)
    //             ->setDateEnregistrement(new \DateTime);
    //     $manager->persist($commande);           
    //     $manager->flush();

    //     $this->addFlash("success", "La commande a été bien mise en compte");
    //     return $this->redirectToRoute('home');
    // }

    // #[Route('cart/show', name: 'show_cart')]
    // public function showCart(CommandeRepository $repo) {
    //     $commandes = $repo->findAll();

    //     return $this->render('cart/commandes.html.twig', [
    //         'commandes' => $commandes
    //     ]);

    // }
}
