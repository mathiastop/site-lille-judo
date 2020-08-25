<?php

namespace App\Entity;

use App\Repository\PostClubDocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PostClubDocumentRepository::class)
 * @Vich\Uploadable
 */
class PostClubDocument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $document;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @Vich\UploadableField(mapping="post_club_images", fileNameProperty="document")
     * @var File
     */
    private $documentFile;

    /**
     * @ORM\ManyToOne(targetEntity=PostClub::class, inversedBy="documents")
     */
    private $postClub;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(?string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDocumentFile()
    {
        return $this->documentFile;
    }

    public function setDocumentFile(\Symfony\Component\HttpFoundation\File\File $document = null)
    {
        $this->documentFile = $document;

        if ($document) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getPostClub(): ?PostClub
    {
        return $this->postClub;
    }

    public function setPostClub(?PostClub $postClub): self
    {
        $this->postClub = $postClub;

        return $this;
    }
}
