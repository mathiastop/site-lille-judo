<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class MentionslegalesController extends AbstractController
{
    /**
     * @Route("/mentionslegales", name="mentionslegales")
     */
    public function index(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Mentions Légales");

        return $this->render('mentionslegales/index.html.twig', [
            'controller_name' => 'MentionslegalesController',
        ]);
    }
}
