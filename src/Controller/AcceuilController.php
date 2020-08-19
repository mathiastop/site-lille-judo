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
    private function checkOnline(int $mode, PostClub $postClub, PostNatio $postNatio)
    {
        if ($mode == 1) {
            if ($postClub->getEnabled() == true)
                return (0);
            else
                return (1);
        } else {
            if ($postNatio->getEnabled() == true)
                return (0);
            else
                return (1);
        }
    }
    /**
     * @Route("/", name="accueil")
     */
    public function index(PostClubRepository $postClubRepository, PostNatioRepository $postNatioRepository)
    {
        $postsClub = $postClubRepository->findBy([], ['createdAt' => 'DESC']);
        $postsNatio = $postNatioRepository->findBy([], ['createdAt' => 'DESC']);
        $i = 0;
        $y = 0;

        dump($postsClub);
        dump($postsNatio);
        if ($i < (count($postsClub) - 1))
            $i += $this->checkOnline(1, $postsClub[$i], $postsNatio[$y]);
        if ($y < (count($postsNatio) - 1))
            $y += $this->checkOnline(2, $postsClub[$i], $postsNatio[$y]);
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
        if ($i < (count($postsClub) - 1))
            $i += $this->checkOnline(1, $postsClub[$i], $postsNatio[$y]);
        if ($y < (count($postsNatio) - 1))
            $y += $this->checkOnline(2, $postsClub[$i], $postsNatio[$y]);
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
        if ($i < (count($postsClub) - 1))
            $i += $this->checkOnline(1, $postsClub[$i], $postsNatio[$y]);
        if ($y < (count($postsNatio) - 1))
            $y += $this->checkOnline(2, $postsClub[$i], $postsNatio[$y]);
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
        if ($i < (count($postsClub) - 1))
            $i += $this->checkOnline(1, $postsClub[$i], $postsNatio[$y]);
        if ($y < (count($postsNatio) - 1))
            $y += $this->checkOnline(2, $postsClub[$i], $postsNatio[$y]);
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
