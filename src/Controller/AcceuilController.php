<?php

namespace App\Controller;

use App\Repository\PostClubRepository;
use App\Repository\PostNatioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(PostClubRepository $postClubRepository, PostNatioRepository $postNatioRepository)
    {
        $postsClub = $postClubRepository->findBy([], ['createdAt' => 'DESC'], 5, 0);
        $postsNatio = $postNatioRepository->findBy([], ['createdAt' => 'DESC'], 5, 0);
        $i = 0;
        $y = 0;

        $first = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($first === $postsClub[$i]) {
            $i++;
        } else {
            $y++;
        }
        $second = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($second === $postsClub[$i]) {
            $i++;
        } else {
            $y++;
        }
        $third = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($third === $postsClub[$i]) {
            $i++;
        } else {
            $y++;
        }
        $fourth = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];

        return $this->render('acceuil/index.html.twig', [
            'first' => $first,
            'second' => $second,
            'third' => $third,
            'fourth' => $fourth,
        ]);
    }
}
