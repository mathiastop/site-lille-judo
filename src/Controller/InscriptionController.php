<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

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
    public function indexAdhesion(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Inscription");
        $breadcrumbs->addItem("Adhésion");

        return $this->render('inscription/adhesion.html.twig', [
            'controller_name' => 'AdhesionController',
        ]);
    }

    /**
     * @Route("/competitions", name="competitions")
     */
    public function indexCompetitions(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Inscription");
        $breadcrumbs->addItem("Compétitions");

        return $this->render('inscription/competitions.html.twig', [
            'controller_name' => 'CompetitionsController',
        ]);
    }
}
