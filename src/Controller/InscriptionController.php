<?php

namespace App\Controller;

use App\Entity\Competition;
use App\Entity\CompetitionInscrit;
use App\Form\CompetitionInscritType;
use App\Repository\CompetitionRepository;
use App\Repository\FicheInscriptionRepository;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription", name="downloadInscription")
     */
    public function inscriptionJudo(FicheInscriptionRepository $ficheInscriptionRepository)
    {
        $fiche = $ficheInscriptionRepository->findOneBy([], ['id' => 'DESC']);
        if ($fiche) {
            $file = new File($this->getParameter('kernel.project_dir').'/public'.$this->getParameter('app.path.fiche_inscription').'/'.$fiche->getFiche());

            return $this->file($file, $fiche->getFiche(), ResponseHeaderBag::DISPOSITION_INLINE);
        }
        return $this->render('inscription/no-file.html.twig');
    }

    /**
     * @Route("/adhesion", name="adhesion")
     */
    public function indexAdhesion(Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Inscription");
        $breadcrumbs->addItem("Adhésion");

        return $this->render('inscription/adhesion.html.twig', [
            'controller_name' => 'AdhesionController',
        ]);
    }

    /**
     * @Route("/competitions", name="competitions")
     */
    public function indexCompetitions(Breadcrumbs $breadcrumbs, RouterInterface $router, CompetitionRepository $competitionRepository)
    {
        $competitionsJudo = $competitionRepository->findBy([
            'sport' => 'Judo'
        ]);
        $competitionsJuJitsu = $competitionRepository->findBy([
            'sport' => 'JuJitsu'
        ]);
        $competitionsTaiso = $competitionRepository->findBy([
            'sport' => 'Taiso'
        ]);
        $competitionsNeWaza = $competitionRepository->findBy([
            'sport' => 'NeWaza'
        ]);
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Inscription");
        $breadcrumbs->addItem("Compétitions");

        return $this->render('inscription/competitions.html.twig', [
            'competitionsJudo' => $competitionsJudo,
            'competitionsJuJitsu' => $competitionsJuJitsu,
            'competitionsTaiso' => $competitionsTaiso,
            'competitionsNeWaza' => $competitionsNeWaza,
        ]);
    }

    /**
     * @Route("/competitions/{id}", name="competitions_inscriptions")
     */
    public function competitionsInscription(Competition $competition, Request $request, Breadcrumbs $breadcrumbs, RouterInterface $router)
    {
        $competitionInscrit = new CompetitionInscrit();
        $form = $this->createForm(CompetitionInscritType::class, $competitionInscrit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $competitionInscrit->setCompetition($competition);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competitionInscrit);
            $entityManager->flush();
            $this->addFlash('success', 'Vous êtes inscrit à cette compétition.');

            return $this->redirectToRoute('competitions');
        }
        $breadcrumbs->addItem("Accueil", $router->generate('accueil'));
        $breadcrumbs->addItem("Inscription");
        $breadcrumbs->addItem("Compétitions", $router->generate('competitions'));
        $breadcrumbs->addItem("Inscription ".$competition->getLieu());
        return $this->render('inscription/competitions-inscription.html.twig', [
            'competition' => $competition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/competitions/{id}", name="admin_competition_show")
     */
    public function adminCompetitionShow(Competition $competition)
    {
        return $this->render('inscription/admin-competitions-show.html.twig', [
            'competition' => $competition,
        ]);
    }
}
