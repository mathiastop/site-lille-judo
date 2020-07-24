<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\PostClub;
use App\Entity\PostNatio;
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
     * @Route("/newsletter", name="newsletter")
     */
    public function indexNewletter(PostRepository $postRepository, PaginatorInterface $paginator, Request $request, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $data = $postRepository->findBy([],['createdAt' => 'desc']);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Newsletter");

        return $this->render('actualites/newsletter.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/newsletter/{id}", name="newsletter_show")
     */
    public function showNewsletter(Post $post, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Newsletter", $router->generate('newsletter'));
        $breadcrumbs->addItem($post->getTitle());

        return $this->render('actualites/newsletter-show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/actualites-club", name="actualites-club")
     */
    public function indexActualitesClub(PostClubRepository $postClubRepository, PaginatorInterface $paginator, Request $request, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $data = $postClubRepository->findBy([],['createdAt' => 'desc']);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Actualités");
        $breadcrumbs->addItem("Actulités Club", $router->generate('actualites-club'));

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
        $breadcrumbs->addItem("Actulités Club", $router->generate('actualites-club'));
        $breadcrumbs->addItem($postClub->getTitle());

        return $this->render('actualites/actualites-club-show.html.twig', [
            'post' => $postClub,
        ]);
    }

    /**
     * @Route("/actualites-nationale-internationale", name="actualites-nationale-internationale")
     */
    public function indexActualitesNationaleInternationale(PostNatioRepository $postNatioRepository, PaginatorInterface $paginator, Request $request, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $data = $postNatioRepository->findBy([],['createdAt' => 'desc']);
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
}
