<?php

namespace App\Controller;

use App\Entity\Professeurs;
use App\Form\ContactType;
use App\Repository\BureauRepository;
use App\Repository\DojoRepository;
use App\Repository\HistoriqueClubRepository;
use App\Repository\HistoriqueEnseignementRepository;
use App\Repository\HistoriquePersonnalitesRepository;
use App\Repository\HistoriquePresidentsRepository;
use App\Repository\ProfesseursRepository;
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
    public function histoireIndex(Breadcrumbs $breadcrumbs, RouterInterface $router,
                                  HistoriqueClubRepository $historiqueClubRepository,
                                  HistoriquePresidentsRepository $historiquePresidentsRepository,
                                  HistoriquePersonnalitesRepository $historiquePersonnalitesRepository,
                                  HistoriqueEnseignementRepository $historiqueEnseignementRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Histoire");

        return $this->render('club/histoire.html.twig', [
            'historiques' => $historiqueClubRepository->findAllOrderByDate(),
            'presidents' => $historiquePresidentsRepository->findAllOrderByDate(),
            'personnalites' => $historiquePersonnalitesRepository->findBy(['enabled' => true]),
            'enseignements' => $historiqueEnseignementRepository->findBy(['enabled' => true]),
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
            'professeurs' => $professeursRepository->findBy(['enabled' => true], ['nom' => 'ASC']),
        ]);
    }

    /**
     * @Route("/enseignants/{id}", name="enseignants_show")
     */
    public function showEnseigant(Professeurs $professeurs, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Les Enseignants", $router->generate('enseignants'));
        $breadcrumbs->addItem($professeurs->getPrenom().' '.$professeurs->getNom());

        return $this->render('club/enseignants-show.html.twig', [
            'professeur' => $professeurs,
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
            'bureaux' => $bureauRepository->findBy(['enabled' => true], ['ordre' => 'ASC']),
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
            $body = 'Nom: '.$contactFormData['Nom:']."\n".
                'Prenom: '.$contactFormData['Prenom:']."\n".
                'Mail: '.$contactFormData['Mail:']."\n".
                "Message: \n".$contactFormData['Message:'];
            $message = (new \Swift_Message('Nouveau message - lillejudo.fr'))
                ->setFrom('fiche.contact0000@gmail.com')
                ->setTo('top.mathias7241@gmail.com')
                ->setBody($body, 'text/plain');
            $mailer->send($message);

            $this->addFlash('success', 'Votre message a bien été envoyé.');

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
    public function dojoIndex(Breadcrumbs $breadcrumbs, RouterInterface $router, DojoRepository $dojoRepository)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Club");
        $breadcrumbs->addItem("Dojo");

        return $this->render('club/dojo.html.twig', [
            'first' => $dojoRepository->findOneBy(['ordre' => '1']),
            'dojos' => $dojoRepository->findAllExceptThisOrder(1)
        ]);
    }
}
