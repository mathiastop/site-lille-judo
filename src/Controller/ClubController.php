<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index()
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    /**
     * @Route("/histoire", name="histoire")
     */
    public function histoireIndex()
    {
        return $this->render('club/histoire.html.twig', [
            'controller_name' => 'HistoireController',
        ]);
    }

    /**
     * @Route("/enseignants", name="enseignants")
     */
    public function enseignantsIndex()
    {
        return $this->render('club/enseignants.html.twig', [
            'controller_name' => 'EnseignantsController',
        ]);
    }

    /**
     * @Route("/bureau", name="bureau")
     */
    public function bureauIndex()
    {
        return $this->render('club/bureau.html.twig', [
            'controller_name' => 'BureauController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactIndex()
    {
        return $this->render('club/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    /**
     * @Route("/dojo", name="dojo")
     */
    public function dojoIndex()
    {
        return $this->render('club/dojo.html.twig', [
            'controller_name' => 'DojoController',
        ]);
    }
}
