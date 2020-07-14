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
        return $this->render('acceuil/index.html.twig', [
            'posts' => $postRepository->findBy([],['id'=>'DESC'],6,0),
        ]);
    }
}
