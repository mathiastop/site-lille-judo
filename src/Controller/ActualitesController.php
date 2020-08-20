<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\PostClub;
use App\Entity\PostNatio;
use App\Repository\EvenementRepository;
use App\Repository\PostClubRepository;
use App\Repository\PostNatioRepository;
use App\Repository\PostRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

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
     * @Route("/actualites-club", name="actualites-club")
     */
    public function indexActualitesClub(PostClubRepository $postClubRepository, PaginatorInterface $paginator, Request $request, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $data = $postClubRepository->findBy(['enabled' => true], ['createdAt' => 'desc']);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Actualités Club", $router->generate('actualites-club'));

        return $this->render('actualites/actualites-club.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/actualites-club/{id}", name="actualites-club_show")
     */
    public function showActualitesClub(PostClub $postClub, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Actualités Club", $router->generate('actualites-club'));
        $breadcrumbs->addItem($postClub->getTitle());
        $firstImage = null;
        if ($postClub->getImages()[0])
            $firstImage = $postClub->getImages()[0]->getImage();

        return $this->render('actualites/actualites-club-show.html.twig', [
            'firstImage' => $firstImage,
            'post' => $postClub,
        ]);
    }

    /**
     * @Route("/actualites-nationale-internationale", name="actualites-nationale-internationale")
     */
    public function indexActualitesNationaleInternationale(PostNatioRepository $postNatioRepository, PaginatorInterface $paginator, Request $request, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $data = $postNatioRepository->findBy(['enabled' => true], ['createdAt' => 'desc']);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Actualités Nationale Internationale", $router->generate('actualites-nationale-internationale'));

        return $this->render('actualites/actualites-nationale-internationale.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/actualites-nationale-internationale/{id}", name="actualites-nationale-internationale_show")
     */
    public function showActualitesNationaleInternationale(PostNatio $postNatio, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Actualités Nationale Internationale", $router->generate('actualites-nationale-internationale'));
        $breadcrumbs->addItem($postNatio->getTitle());

        return $this->render('actualites/actualites-nationale-internationale-show.html.twig', [
            'post' => $postNatio,
        ]);
    }

    /**
     * @Route("/evenements", name="evenements")
     */
    public function indexEvenements(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Evénements", $router->generate('evenements'));

        return $this->render('actualites/evenements.html.twig', [
            'controller_name' => 'EvenementsController'
        ]);
    }

    /**
     * @Route("/evenements/{id}", name="evenements_show")
     */
    public function showEvenements(Evenement $evenement, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Evénements", $router->generate('evenements'));
        $breadcrumbs->addItem($evenement->getTitre());

        return $this->render('actualites/evenements-show.html.twig', [
            'evenement' => $evenement
        ]);
    }
}
