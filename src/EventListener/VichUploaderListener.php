<?php


namespace App\EventListener;

use App\Entity\Boutique;
use App\Entity\BoutiqueFiche;
use App\Entity\Bureau;
use App\Entity\FicheInscription;
use App\Entity\GalleryImage;
use App\Entity\PhotosPassagesGrades;
use App\Entity\PostClub;
use App\Entity\PostNatio;
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

        if ($object instanceof PostClub && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/club/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/club/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof PostNatio && $object->getImage()) {
            $image = $this->kernel->getProjectDir().'/public/uploads/natio/'.$object->getImage();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueId = md5(uniqid(rand(), true)).'.'.$extension;
            rename($image, $this->kernel->getProjectDir().'/public/uploads/natio/'.$uniqueId);
            $object->setImage($uniqueId);
        }
        if ($object instanceof PostNatio && $object->getImage()) {
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
    }
}