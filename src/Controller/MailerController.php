<?php

namespace App\Controller;

use App\Entity\Mailer;
use App\Form\MailerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function mailer(Request $request, EntityManagerInterface $manager, Mailer $mailer = null): Response
    {
        if ($mailer == null) {

            $mailer = new Mailer;
        }

        $form = $this->createForm(MailerType::class, $mailer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($mailer);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('base.html.twig', [
            'mailForm' => $form,
            'mailer' => $mailer,
        ]);
    }
}
