<?php

namespace App\Controller;

use App\Repository\FicheInscriptionRepository;
use App\Repository\JudoCoursRepository;
use App\Repository\JuJitsuCoursRepository;
use App\Repository\NeWazaCoursRepository;
use App\Repository\TaisoCoursRepository;
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
    public function indexJudo(Breadcrumbs $breadcrumbs, RouterInterface $router, JudoCoursRepository $judoCoursRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Judo");

        return $this->render('disciplines/judo.html.twig', [
            'first' => $judoCoursRepository->findOneBy(['ordre' => '1']),
            'judos' => $judoCoursRepository->findAllExceptThisOrder(1)
        ]);
    }

    /**
     * @Route("/ju-jitsu", name="ju-jitsu")
     */
    public function indexJuJitsu(Breadcrumbs $breadcrumbs, RouterInterface $router, JuJitsuCoursRepository $juJitsuCoursRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Ju Jitsu");

        return $this->render('disciplines/ju-jitsu.html.twig', [
            'first' => $juJitsuCoursRepository->findOneBy(['ordre' => '1']),
            'jujitsus' => $juJitsuCoursRepository->findAllExceptThisOrder(1)
        ]);
    }

    /**
     * @Route("/taiso", name="taiso")
     */
    public function indexTaiso(Breadcrumbs $breadcrumbs, RouterInterface $router, TaisoCoursRepository $taisoCoursRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Taiso");

        return $this->render('disciplines/taiso.html.twig', [
            'first' => $taisoCoursRepository->findOneBy(['ordre' => '1']),
            'taisos' => $taisoCoursRepository->findAllExceptThisOrder(1)
        ]);
    }

    /**
     * @Route("/ne-waza", name="ne-waza")
     */
    public function indexNeWaza(Breadcrumbs $breadcrumbs, RouterInterface $router, NeWazaCoursRepository $neWazaCoursRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Ne Waza");

        return $this->render('disciplines/ne-waza.html.twig', [
            'first' => $neWazaCoursRepository->findOneBy(['ordre' => '1']),
            'newazas' => $neWazaCoursRepository->findAllExceptThisOrder(1)
        ]);
    }
}
