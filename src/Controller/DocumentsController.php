<?php

namespace App\Controller;

use App\Entity\DocumentsUtiles;
use App\Repository\DocumentsUtilesRepository;
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
    public function index(GalleryRepository $galleryRepository, Breadcrumbs $breadcrumbs, RouterInterface $router, PhotosPassagesGradesRepository $photosPassagesGradesRepository, DocumentsUtilesRepository  $documentsUtilesRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Documents");

        return $this->render('documents/index.html.twig', [
            'gallerys' => $galleryRepository->findBy(['enabled' => true], ['id'=>'DESC']),
            'photos_passages_grades' => $photosPassagesGradesRepository->findBy(['enabled' => true], ['id'=>'DESC']),
            'documentsUtiles' => $documentsUtilesRepository->findBy(['enabled' => true], ['ordre' => 'ASC']),
        ]);
    }

    /**
     * @Route("/documents/{id}", name="documentShow")
     */
    public function documentShow(DocumentsUtiles $documentsUtiles)
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public'.$this->getParameter('app.path.documents_utiles').'/'.$documentsUtiles->getFiche());

        return $this->file($file, $documentsUtiles->getTitre().'.'.pathinfo($documentsUtiles->getFiche(), PATHINFO_EXTENSION), ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documentsJaune", name="jaune")
     */
    public function jaune()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_jaune.pdf');

        return $this->file($file, 'passage_jaune.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documentsOrange", name="orange")
     */
    public function orange()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_orange.pdf');

        return $this->file($file, 'passage_orange.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documentsVerte", name="verte")
     */
    public function verte()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_verte.pdf');

        return $this->file($file, 'passage_verte.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }

    /**
     * @Route("/documentsMarron", name="marron")
     */
    public function marron()
    {
        $file = new File($this->getParameter('kernel.project_dir').'/public/assets/passage_marron.pdf');

        return $this->file($file, 'passage_marron.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
