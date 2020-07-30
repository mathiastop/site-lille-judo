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
        $senior = $judoCoursRepository->findOneBy([
            'categorie' => 'Seniors'
        ]);
        $junior = $judoCoursRepository->findOneBy([
            'categorie' => 'Juniors'
        ]);
        $cadet = $judoCoursRepository->findOneBy([
            'categorie' => 'Cadets'
        ]);
        $minime = $judoCoursRepository->findOneBy([
            'categorie' => 'Minimes'
        ]);
        $benjamin = $judoCoursRepository->findOneBy([
            'categorie' => 'Benjamins'
        ]);
        $poussin = $judoCoursRepository->findOneBy([
            'categorie' => 'Poussins'
        ]);
        $miniPoussin = $judoCoursRepository->findOneBy([
            'categorie' => 'Mini-Poussins'
        ]);
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Judo");

        return $this->render('disciplines/judo.html.twig', [
            'miniPoussin' => $miniPoussin,
            'poussin' => $poussin,
            'benjamin' => $benjamin,
            'minime' => $minime,
            'cadet' => $cadet,
            'junior' => $junior,
            'senior' => $senior,
        ]);
    }

    /**
     * @Route("/ju-jitsu", name="ju-jitsu")
     */
    public function indexJuJitsu(Breadcrumbs $breadcrumbs, RouterInterface $router, JuJitsuCoursRepository $juJitsuCoursRepository)
    {
        $senior = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Seniors'
        ]);
        $junior = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Juniors'
        ]);
        $cadet = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Cadets'
        ]);
        $minime = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Minimes'
        ]);
        $benjamin = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Benjamins'
        ]);
        $poussin = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Poussins'
        ]);
        $miniPoussin = $juJitsuCoursRepository->findOneBy([
            'categorie' => 'Mini-Poussins'
        ]);
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Ju Jitsu");

        return $this->render('disciplines/ju-jitsu.html.twig', [
            'miniPoussin' => $miniPoussin,
            'poussin' => $poussin,
            'benjamin' => $benjamin,
            'minime' => $minime,
            'cadet' => $cadet,
            'junior' => $junior,
            'senior' => $senior,
        ]);
    }

    /**
     * @Route("/taiso", name="taiso")
     */
    public function indexTaiso(Breadcrumbs $breadcrumbs, RouterInterface $router, TaisoCoursRepository $taisoCoursRepository)
    {
        $senior = $taisoCoursRepository->findOneBy([
            'categorie' => 'Seniors'
        ]);
        $junior = $taisoCoursRepository->findOneBy([
            'categorie' => 'Juniors'
        ]);
        $cadet = $taisoCoursRepository->findOneBy([
            'categorie' => 'Cadets'
        ]);
        $minime = $taisoCoursRepository->findOneBy([
            'categorie' => 'Minimes'
        ]);
        $benjamin = $taisoCoursRepository->findOneBy([
            'categorie' => 'Benjamins'
        ]);
        $poussin = $taisoCoursRepository->findOneBy([
            'categorie' => 'Poussins'
        ]);
        $miniPoussin = $taisoCoursRepository->findOneBy([
            'categorie' => 'Mini-Poussins'
        ]);
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Taiso");

        return $this->render('disciplines/taiso.html.twig', [
            'miniPoussin' => $miniPoussin,
            'poussin' => $poussin,
            'benjamin' => $benjamin,
            'minime' => $minime,
            'cadet' => $cadet,
            'junior' => $junior,
            'senior' => $senior,
        ]);
    }

    /**
     * @Route("/ne-waza", name="ne-waza")
     */
    public function indexNeWaza(Breadcrumbs $breadcrumbs, RouterInterface $router, NeWazaCoursRepository $neWazaCoursRepository)
    {
        $senior = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Seniors'
        ]);
        $junior = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Juniors'
        ]);
        $cadet = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Cadets'
        ]);
        $minime = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Minimes'
        ]);
        $benjamin = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Benjamins'
        ]);
        $poussin = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Poussins'
        ]);
        $miniPoussin = $neWazaCoursRepository->findOneBy([
            'categorie' => 'Mini-Poussins'
        ]);
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Disciplines");
        $breadcrumbs->addItem("Ne Waza");

        return $this->render('disciplines/ne-waza.html.twig', [
            'miniPoussin' => $miniPoussin,
            'poussin' => $poussin,
            'benjamin' => $benjamin,
            'minime' => $minime,
            'cadet' => $cadet,
            'junior' => $junior,
            'senior' => $senior,
        ]);
    }
}
