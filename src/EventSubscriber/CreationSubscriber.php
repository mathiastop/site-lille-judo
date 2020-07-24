<?php

namespace App\EventSubscriber;

use App\Entity\Bureau;
use App\Entity\FicheInscription;
use App\Entity\Gallery;
use App\Entity\GalleryImage;
use App\Entity\Post;
use App\Entity\PostClub;
use App\Entity\PostNatio;
use App\Entity\Professeurs;
use App\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreationSubscriber implements EventSubscriber
{
    private $encoder;
    private $kernel;

    public function __construct(UserPasswordEncoderInterface $encoder, KernelInterface $kernel)
    {
        $this->encoder = $encoder;
        $this->kernel = $kernel;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate,
            Events::preRemove,
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Post) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof User) {
            $entity->setPassword($this->encoder->encodePassword($entity, $entity->getPassword()));
        }
        if ($entity instanceof PostClub) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PostNatio) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Professeurs) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Bureau) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Gallery) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof GalleryImage) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof FicheInscription) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Post) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PostClub) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PostNatio) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Professeurs) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Bureau) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Gallery) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof GalleryImage) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof FicheInscription) {
            $entity->setUpdatedAt(new \DateTime());
        }
    }

    public function preRemove(LifecycleEventArgs $args) {
        $entity = $args->getEntity();

        if ($entity instanceof Post) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/post/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/post/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PostClub) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/club/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/club/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PostNatio) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/natio/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/natio/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PostNatio) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/professeurs/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/professeurs/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Bureau) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/bureau/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/bureau/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof GalleryImage) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/gallery/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/gallery/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof FicheInscription) {
            $imageName = $entity->getFiche();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/fiche/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/fiche/'.$imageName);
            }
            $entity->setFiche('null');
            $entity->setUpdatedAt(new \DateTime());
        }
    }
}
