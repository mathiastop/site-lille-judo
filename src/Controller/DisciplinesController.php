<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class DisciplinesController extends AbstractController
{
    /**
     * @Route("/disciplines", name="disciplines")
     */
    public function index()
    {
        return $this->render('disciplines/index.html.twig', [
            'controller_name' => 'DisciplinesController',
        ]);
    }

    /**
     * @Route("/judo", name="judo")
     */
    public function indexJudo(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Judo");

        return $this->render('disciplines/judo.html.twig', [
            'controller_name' => 'JudoController',
        ]);
    }

    /**
     * @Route("/judo/inscription", name="downloadJudoInscription")
     */
    public function inscriptionJudo()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/Fiche_LUC_JUDO_2019_2020.pdf');

        return $this->file($file, 'Fiche_LUC_JUDO_2019_2020.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/ju-jitsu", name="ju-jitsu")
     */
    public function indexJuJitsu(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Ju Jitsu");

        return $this->render('disciplines/ju-jitsu.html.twig', [
            'controller_name' => 'JuJitsuController',
        ]);
    }

    /**
     * @Route("/taiso", name="taiso")
     */
    public function indexTaiso(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Taiso");

        return $this->render('disciplines/taiso.html.twig', [
            'controller_name' => 'TaisoController',
        ]);
    }

    /**
     * @Route("/ne-waza", name="ne-waza")
     */
    public function indexNeWaza(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Ne Waza");

        return $this->render('disciplines/ne-waza.html.twig', [
            'controller_name' => 'NeWazaController',
        ]);
    }
}
