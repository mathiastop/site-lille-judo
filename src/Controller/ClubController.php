<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\BureauRepository;
use App\Repository\HistoriqueClubRepository;
use App\Repository\ProfesseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index()
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    /**
     * @Route("/histoire", name="histoire")
     */
    public function histoireIndex(Breadcrumbs $breadcrumbs, RouterInterface $router, HistoriqueClubRepository $historiqueClubRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Histoire");

        return $this->render('club/histoire.html.twig', [
            'historiques' => $historiqueClubRepository->findAllOrderByDate(),
        ]);
    }

    /**
     * @Route("/enseignants", name="enseignants")
     */
    public function enseignantsIndex(ProfesseursRepository $professeursRepository, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Les Enseignants");

        return $this->render('club/enseignants.html.twig', [
            'professeurs' => $professeursRepository->findAllOrderByName(),
        ]);
    }

    /**
     * @Route("/bureau", name="bureau")
     */
    public function bureauIndex(BureauRepository $bureauRepository, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Bureau");

        return $this->render('club/bureau.html.twig', [
            'president' => $bureauRepository->findOneBy([
                'role' => 'Président'
            ]),
            'tresorier' => $bureauRepository->findOneBy([
                'role' => 'Trésorier'
            ]),
            'secretaire' => $bureauRepository->findOneBy([
                'role' => 'Secrétaire'
            ]),
            'secretaireAdj' => $bureauRepository->findOneBy([
                'role' => 'Secrétaire Adjointe'
            ]),
            'bureaux' => $bureauRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactIndex(Request $request, \Swift_Mailer $mailer, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $message = (new \Swift_Message('Nouveau message - lillejudo.fr'))
                ->setFrom('fiche.contact0000@gmail.com')
                ->setTo('top.mathias7241@gmail.com')
                ->setBody($contactFormData['Message:']);
            $mailer->send($message);

            return $this->redirectToRoute('accueil');
        }
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Contact");

        return $this->render('club/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dojo", name="dojo")
     */
    public function dojoIndex(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Dojo");

        return $this->render('club/dojo.html.twig', [
            'controller_name' => 'DojoController',
        ]);
    }
}
