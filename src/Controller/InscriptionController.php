<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index()
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    /**
     * @Route("/adhesion", name="adhesion")
     */
    public function indexAdhesion()
    {
        return $this->render('inscription/adhesion.html.twig', [
            'controller_name' => 'AdhesionController',
        ]);
    }

    /**
     * @Route("/competitions", name="competitions")
     */
    public function indexCompetitions()
    {
        return $this->render('inscription/competitions.html.twig', [
            'controller_name' => 'CompetitionsController',
        ]);
    }
}
