<?php

namespace App\Controller;

use App\Repository\FicheInscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="downloadInscription")
     */
    public function inscriptionJudo(FicheInscriptionRepository $ficheInscriptionRepository)
    {
        $fiche = $ficheInscriptionRepository->findOneBy([], ['id' => 'DESC']);
        if ($fiche) {
            $file = new File($this->getParameter('kernel.project_dir').'/public'.$this->getParameter('app.path.fiche_inscription').'/'.$fiche->getFiche());

            return $this->file($file, $fiche->getFiche(), ResponseHeaderBag::DISPOSITION_INLINE);
        }
        return $this->render('inscription/no-file.html.twig');
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
