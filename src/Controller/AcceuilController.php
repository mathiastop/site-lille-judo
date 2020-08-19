<?php

namespace App\Controller;

use App\Entity\PostClub;
use App\Entity\PostNatio;
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
        $postsClub = $postClubRepository->findBy(['enabled' => true], ['createdAt' => 'DESC']);
        $postsNatio = $postNatioRepository->findBy(['enabled' => true], ['createdAt' => 'DESC']);
        $i = 0;
        $y = 0;

        $first = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($first === $postsClub[$i]) {
            $firstType = 'Club';
            if ($i < (count($postsClub) - 1))
                $i++;
        } else {
            $firstType = 'Natio';
            if ($y < (count($postsNatio) - 1))
                $y++;
        }
        $second = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($second === $postsClub[$i]) {
            $secondType = 'Club';
            if ($i < (count($postsClub) - 1))
                $i++;
        } else {
            $secondType = 'Natio';
            if ($y < (count($postsNatio) - 1))
                $y++;
        }
        $third = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($third === $postsClub[$i]) {
            $thirdType = 'Club';
            if ($i < (count($postsClub) - 1))
                $i++;
        } else {
            $thirdType = 'Natio';
            if ($y < (count($postsNatio) - 1))
                $y++;
        }
        $fourth = $postsClub[$i]->getCreatedAt() > $postsNatio[$y]->getCreatedAt() ? $postsClub[$i] : $postsNatio[$y];
        if ($fourth === $postsClub[$i])
            $fourthType = 'Club';
        else
            $fourthType = 'Natio';
        return $this->render('acceuil/index.html.twig', [
            'first' => $first,
            'firstType' => $firstType,
            'second' => $second,
            'secondType' => $secondType,
            'third' => $third,
            'thirdType' => $thirdType,
            'fourth' => $fourth,
            'fourthType' => $fourthType,
        ]);
    }
}
