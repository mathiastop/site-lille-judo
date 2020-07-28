<?php

namespace App\Controller;

use App\Repository\GalleryRepository;
use App\Repository\PhotosPassagesGradesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class DocumentsController extends AbstractController
{
    /**
     * @Route("/documents", name="documents")
     */
    public function index(GalleryRepository $galleryRepository, Breadcrumbs $breadcrumbs, RouterInterface $router, PhotosPassagesGradesRepository $photosPassagesGradesRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Documents");

        return $this->render('documents/index.html.twig', [
            'gallerys' => $galleryRepository->findBy([],['id'=>'DESC']),
            'photos_passages_grades' => $photosPassagesGradesRepository->findBy([],['id'=>'DESC']),
        ]);
    }

    /**
     * @Route("/documents/jaune", name="jaune")
     */
    public function jaune()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_jaune.pdf');

        return $this->file($file, 'passage_jaune.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documents/orange", name="orange")
     */
    public function orange()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_orange.pdf');

        return $this->file($file, 'passage_orange.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documents/verte", name="verte")
     */
    public function verte()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_verte.pdf');

        return $this->file($file, 'passage_verte.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documents/marron", name="marron")
     */
    public function marron()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_marron.pdf');

        return $this->file($file, 'passage_marron.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
