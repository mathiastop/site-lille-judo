<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findBy([],['id'=>'DESC'],5,0);
        $first = $posts[0];
        $second = $posts[1];
        $third = $posts[2];
        $fourth = $posts[3];
        $fifth = $posts[4];

        return $this->render('acceuil/index.html.twig', [
            'first' => $first,
            'second' => $second,
            'third' => $third,
            'fourth' => $fourth,
            'fifth' => $fifth,
        ]);
    }
}
