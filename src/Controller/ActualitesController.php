<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActualitesController extends AbstractController
{
    /**
     * @Route("/actualites", name="actualites")
     */
    public function index()
    {
        return $this->render('actualites/index.html.twig', [
            'controller_name' => 'ActualitesController',
        ]);
    }

    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function indexNewletter()
    {
        return $this->render('actualites/newsletter.html.twig', [
            'controller_name' => 'NewsletterController',
        ]);
    }

    /**
     * @Route("/actualites-club", name="actualites-club")
     */
    public function indexActualitesClub()
    {
        return $this->render('actualites/actualites-club.html.twig', [
            'controller_name' => 'ActualitesClubController',
        ]);
    }

    /**
     * @Route("/actualites-nationale-internationale", name="actualites-nationale-internationale")
     */
    public function indexActualitesNationaleInternationale()
    {
        return $this->render('actualites/actualites-nationale-internationale.html.twig', [
            'controller_name' => 'ActualitesNationaleInternationaleClubController',
        ]);
    }
}
