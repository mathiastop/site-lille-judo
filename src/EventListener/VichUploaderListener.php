<?php


namespace App\EventListener;

use App\Entity\Boutique;
use App\Entity\BoutiqueFiche;
use App\Entity\Bureau;
use App\Entity\CompetitionDocument;
use App\Entity\DocumentsUtiles;
use App\Entity\EvenementDocument;
use App\Entity\FicheInscription;
use App\Entity\GalleryImage;
use App\Entity\InscriptionApresDocument;
use App\Entity\InscriptionApresPhoto;
use App\Entity\InscriptionAvantDocument;
use App\Entity\InscriptionAvantPhoto;
use App\Entity\InscriptionPendantDocument;
use App\Entity\InscriptionPendantPhoto;
use App\Entity\PhotosPassagesGrades;
use App\Entity\PostClubDocument;
use App\Entity\PostClubImage;
use App\Entity\PostNatioDocument;
use App\Entity\PostNatioImage;
use App\Entity\Professeurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Vich\UploaderBundle\Event\Event;

class VichUploaderListener
{
    private $kernel;
    private $entityManager;

    public function __construct(KernelInterface $kernel, EntityManagerInterface $entityManager)
    {
        $this->kernel = $kernel;
        $this->entityManager = $entityManager;
    }

    public function onVichUploaderPostUpload(Event $event)
    {
        $object = $event->getObject();

        if ($object instanceof PostClubImage && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/club/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/club/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof PostClubDocument && $object->getDocument()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/club/'.$object->getDocument();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/club/'.$uniqueId);
            $object->setDocument($uniqueId);
        }
        if ($object instanceof PostNatioImage && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/natio/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/natio/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof PostNatioDocument && $object->getDocument()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/natio/'.$object->getDocument();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/natio/'.$uniqueId);
            $object->setDocument($uniqueId);
        }
        if ($object instanceof Professeurs && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/professeurs/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/professeurs/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof Bureau && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/bureau/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/bureau/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof GalleryImage && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/gallery/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/gallery/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof FicheInscription && $object->getFiche()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/fiche/'.$object->getFiche();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/fiche/'.$uniqueId);
            $object->setFiche($uniqueId);
        }
        if ($object instanceof Boutique && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/boutique/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/boutique/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof PhotosPassagesGrades && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/passage_grades/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/passage_grades/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof BoutiqueFiche && $object->getFiche()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/boutique_fiche/'.$object->getFiche();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/boutique_fiche/'.$uniqueId);
            $object->setFiche($uniqueId);
        }
        if ($object instanceof DocumentsUtiles && $object->getFiche()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/documents_utiles/'.$object->getFiche();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/documents_utiles/'.$uniqueId);
            $object->setFiche($uniqueId);
        }
        if ($object instanceof CompetitionDocument && $object->getDocument()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/documents_competition/'.$object->getDocument();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/documents_competition/'.$uniqueId);
            $object->setDocument($uniqueId);
        }
        if ($object instanceof EvenementDocument && $object->getFiche()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/documents_evenement/'.$object->getFiche();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/documents_evenement/'.$uniqueId);
            $object->setFiche($uniqueId);
        }
        if ($object instanceof InscriptionAvantPhoto && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/inscription_avant/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/inscription_avant/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof InscriptionAvantDocument && $object->getDocument()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/inscription_avant/'.$object->getDocument();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/inscription_avant/'.$uniqueId);
            $object->setDocument($uniqueId);
        }
        if ($object instanceof InscriptionPendantPhoto && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/inscription_pendant/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/inscription_pendant/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof InscriptionPendantDocument && $object->getDocument()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/inscription_pendant/'.$object->getDocument();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/inscription_pendant/'.$uniqueId);
            $object->setDocument($uniqueId);
        }
        if ($object instanceof InscriptionApresPhoto && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/inscription_apres/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/inscription_apres/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof InscriptionApresDocument && $object->getDocument()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/inscription_apres/'.$object->getDocument();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/inscription_apres/'.$uniqueId);
            $object->setDocument($uniqueId);
        }
    }
}