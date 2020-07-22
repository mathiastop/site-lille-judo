<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MentionslegalesController extends AbstractController
{
    /**
     * @Route("/mentionslegales", name="mentionslegales")
     */
    public function index()
    {
        return $this->render('mentionslegales/index.html.twig', [
            'controller_name' => 'MentionslegalesController',
        ]);
    }
}
