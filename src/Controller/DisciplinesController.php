<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
    public function indexJudo()
    {
        return $this->render('disciplines/judo.html.twig', [
            'controller_name' => 'JudoController',
        ]);
    }

    /**
     * @Route("/ju-jitsu", name="ju-jitsu")
     */
    public function indexJuJitsu()
    {
        return $this->render('disciplines/ju-jitsu.html.twig', [
            'controller_name' => 'JuJitsuController',
        ]);
    }

    /**
     * @Route("/taiso", name="taiso")
     */
    public function indexTaiso()
    {
        return $this->render('disciplines/taiso.html.twig', [
            'controller_name' => 'TaisoController',
        ]);
    }

    /**
     * @Route("/ne-waza", name="ne-waza")
     */
    public function indexNeWaza()
    {
        return $this->render('disciplines/ne-waza.html.twig', [
            'controller_name' => 'NeWazaController',
        ]);
    }
}
