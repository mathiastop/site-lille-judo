<?php

namespace App\Controller;

use App\Repository\BoutiqueFicheRepository;
use App\Repository\BoutiqueRepository;
use App\Repository\FicheInscriptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class BoutiqueController extends AbstractController
{
    /**
     * @Route("/boutique", name="boutique")
     */
    public function index(Breadcrumbs $breadcrumbs, RouterInterface $router, BoutiqueRepository $boutiqueRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Boutique");
        return $this->render('boutique/index.html.twig', [
            'boutiques' => $boutiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/boutique/document", name="boutiqueDocument")
     */
    public function inscriptionJudo(BoutiqueFicheRepository $boutiqueFicheRepository)
    {
        $fiche = $boutiqueFicheRepository->findOneBy([], ['id' => 'DESC']);
        if ($fiche) {
            $file = new File($this->getParameter('kernel.project_dir').'/public'.$this->getParameter('app.path.boutique_fiche').'/'.$fiche->getFiche());

            return $this->file($file, $fiche->getTitre().'.'.pathinfo($fiche->getFiche(), PATHINFO_EXTENSION), ResponseHeaderBag::DISPOSITION_INLINE);
        }
        return $this->render('inscription/no-file.html.twig');
    }
}
