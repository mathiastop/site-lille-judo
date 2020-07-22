<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProfesseursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
    public function histoireIndex()
    {
        return $this->render('club/histoire.html.twig', [
            'controller_name' => 'HistoireController',
        ]);
    }

    /**
     * @Route("/enseignants", name="enseignants")
     */
    public function enseignantsIndex(ProfesseursRepository $professeursRepository)
    {
        return $this->render('club/enseignants.html.twig', [
            'professeurs' => $professeursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/bureau", name="bureau")
     */
    public function bureauIndex()
    {
        return $this->render('club/bureau.html.twig', [
            'controller_name' => 'BureauController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactIndex(Request $request, \Swift_Mailer $mailer)
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

        return $this->render('club/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/dojo", name="dojo")
     */
    public function dojoIndex()
    {
        return $this->render('club/dojo.html.twig', [
            'controller_name' => 'DojoController',
        ]);
    }
}
