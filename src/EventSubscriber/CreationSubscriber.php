<?php

namespace App\EventSubscriber;

use App\Entity\Boutique;
use App\Entity\Bureau;
use App\Entity\FicheInscription;
use App\Entity\Gallery;
use App\Entity\GalleryImage;
use App\Entity\PhotosPassagesGrades;
use App\Entity\PostClub;
use App\Entity\PostNatio;
use App\Entity\Professeurs;
use App\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use MartinGeorgiev\SocialPost\Message;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreationSubscriber implements EventSubscriber
{
    private $encoder;
    private $kernel;
    private $container;

    public function __construct(UserPasswordEncoderInterface $encoder, KernelInterface $kernel, ContainerInterface $container)
    {
        $this->encoder = $encoder;
        $this->kernel = $kernel;
        $this->container = $container;
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

        if ($entity instanceof User) {
            $entity->setPassword($this->encoder->encodePassword($entity, $entity->getPassword()));
        }
        if ($entity instanceof PostClub) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
            $message = new Message(
                $entity->getTitle()//,
//                'https://lillejudo.mathiastop.eu/actualites-club/'.$entity->getId()
                // TODO: change URL before true launching
            );
            $this->container->get('social_post')->publish($message);
        }
        if ($entity instanceof PostNatio) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
            $message = new Message(
                $entity->getTitle()//,
//                'https://lillejudo.mathiastop.eu/actualites-nationale-internationale/'.$entity->getId()
            // TODO: change URL before true launching
            );
            $this->container->get('social_post')->publish($message);
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
        if ($entity instanceof Boutique) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PhotosPassagesGrades) {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

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
        if ($entity instanceof Boutique) {
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PhotosPassagesGrades) {
            $entity->setUpdatedAt(new \DateTime());
        }
    }

    public function preRemove(LifecycleEventArgs $args) {
        $entity = $args->getEntity();

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
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof Boutique) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/boutique/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/boutique/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
        if ($entity instanceof PhotosPassagesGrades) {
            $imageName = $entity->getImage();
            if ($imageName && file_exists($this->kernel->getProjectDir().'/public/uploads/passage_grades/'.$imageName)) {
                unlink($this->kernel->getProjectDir().'/public/uploads/passage_grades/'.$imageName);
            }
            $entity->setUpdatedAt(new \DateTime());
        }
    }
}
