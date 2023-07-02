<?php

namespace App\Controller;

use DateTime;
use App\Entity\Membre;
use App\Entity\Chambre;
use App\Entity\Comment;
use App\Entity\Contact;
use App\Entity\Commande;
use App\Form\CommentType;
use App\Form\ContactType;
use App\Form\CommandeType;
use App\Repository\SliderRepository;
use App\Repository\ChambreRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\form;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(SliderRepository $repo): Response
    {
        $slider = $repo->findAll();
        // dd($slider);

        return $this->render('app/index.html.twig', [
            'slider' => $slider
        ]);
    }

    #[Route('/app/show', name: 'show')]
    public function show(ChambreRepository $repo, SliderRepository $slideRepo)
    {
        $chambres = $repo->findAll();
        $sliders = $slideRepo->findBy(['page' => 'chambre']);

        return $this->render('app/chambre.html.twig', [
            'chambres' => $chambres,
            'slider' => $sliders

        ]);
    }

    #[Route('/app/show/{id}', name: 'show_one')]
    public function showOne(Chambre $chambre, EntityManagerInterface $manager, Request $request, SliderRepository $slideRepo)
    {
        $sliders = $slideRepo->findBy(['page' => 'chambre']);

        $commande = new commande;


        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dateArrivee = $commande->getDateArrivee();
            $dateDepart = $commande->getDateDepart();
            $prix = $chambre->getPrixJournalier();

            if ($dateArrivee !== null && $dateDepart !== null) {
                $diff = $dateDepart->diff($dateArrivee);
                $days = $diff->days;
                $prixTotal = $days * $prix;
            } else {
                $prixTotal = 0;
            }
            $commande->setDateEnregistrement(new DateTime)
                ->setPrixTotal($prixTotal)
                ->setChambre($chambre);
            $manager->persist($commande);
            $manager->flush();
            $this->addFlash('success', 'Commande enregistré');

            return $this->redirectToRoute('home');
        }



        return $this->render('app/show.html.twig', [
            'chambre' => $chambre,
            'form' => $form->createView(),
            'slider' => $sliders
        ]);
    }

    #[Route('app/restaurant', name: 'app_resto')]
    public function restaurant(sliderRepository $repo)
    {

        $sliders = $repo->findBy(['page' => 'restaurant']);

        return $this->render('app/restaurant.html.twig', [
            'slider' => $sliders
        ]);
    }

    #[Route('app/spa', name: 'app_spa')]
    public function spa(sliderRepository $repo)
    {

        $sliders = $repo->findBy(['page' => 'spa']);


        return $this->render('app/spa.html.twig', [
            'slider' => $sliders
        ]);
    }

    #[Route('app/hotel', name: 'app_hotel')]
    public function hotel(sliderRepository $repo): Response
    {
        $hotel = $repo->findAll();
        $sliders = $repo->findBy(['page' => 'hotel']);

        return $this->render('app/hotel.html.twig', [
            'hotel' => $hotel,
            'slider' => $sliders,
        ]);
    }

    #[Route('app/avis', name: 'app_avis')]
    public function avis(EntityManagerInterface $manager, Request $request, CommentRepository $repo, sliderRepository $slideRepo)
    {
        $sliders = $slideRepo->findBy(['page' => 'avis']);
        $categorie = $request->query->get('categorie');
        $comments = [];

        switch ($categorie) {
            case 'chambre':
                $comments = $repo->findBy(['categorie' => 'chambre'], ['createdAt' => 'DESC']);
                break;
            case 'restaurant':
                $comments = $repo->findBy(['categorie' => 'restaurant'], ['createdAt' => 'DESC']);
                break;
            case 'spa':
                $comments = $repo->findBy(['categorie' => 'spa'], ['createdAt' => 'DESC']);
                break;
            default:
                $comments = $repo->findBy([], ['createdAt' => 'DESC']);
                break;
        }

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime);
            $manager->persist($comment);
            $manager->flush();
        }

        return $this->render('app/avis.html.twig', [
            'commentForm' => $form->createView(),
            'comment' => $comment,
            'comments' => $comments,
            'selectedCategorie' => $categorie,
            'slider' => $sliders
        ]);
    }

    #[Route('app/contact', name: 'contact')]
    public function contact(Request $request, EntityManagerInterface $manager, SliderRepository $slideRepo)
    {
        $sliders = $slideRepo->findBy(['page' => 'contact']);
        $contact = new Contact;

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($contact);
            $manager->flush();

            $this->addFlash('success', 'Votre message a été bien enregistré');

            return $this->redirectToRoute('contact');
        }



        return $this->render('app/contact.html.twig', [
            'contactForm' => $form->createView(),
            'slider' => $sliders
        ]);
    }
}
