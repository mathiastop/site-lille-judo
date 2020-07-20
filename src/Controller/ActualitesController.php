<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\PostClub;
use App\Repository\PostClubRepository;
use App\Repository\PostRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
    public function indexNewletter(PostRepository $postRepository, PaginatorInterface $paginator, Request $request)
    {
        $data = $postRepository->findBy([],['createdAt' => 'desc']);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('actualites/newsletter.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/newsletter/{id}", name="newsletter_show")
     */
    public function showNewsletter(Post $post)
    {
        return $this->render('actualites/newsletter-show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/actualites-club", name="actualites-club")
     */
    public function indexActualitesClub(PostClubRepository $postClubRepository, PaginatorInterface $paginator, Request $request)
    {
        $data = $postClubRepository->findBy([],['createdAt' => 'desc']);
        $posts = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('actualites/actualites-club.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/actualites-club/{id}", name="actualites-club_show")
     */
    public function showActualitesClub(PostClub $postClub)
    {
        return $this->render('actualites/actualites-club-show.html.twig', [
            'post' => $postClub,
        ]);
    }

    /**
     * @Route("/actualites-nationale-internationale", name="actualites-nationale-internationale")
     */
    public function indexActualitesNationaleInternationale()
    {
        return $this->render('actualites/actualites-nationale-internationale.html.twig', [
            'controller_name' => 'ActualitesNationaleInternationaleClubController',
        ]);
    }
}
