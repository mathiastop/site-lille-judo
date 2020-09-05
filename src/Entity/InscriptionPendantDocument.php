<?php

namespace App\Entity;

use App\Repository\InscriptionPendantDocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=InscriptionPendantDocumentRepository::class)
 * @Vich\Uploadable
 */
class InscriptionPendantDocument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $document;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @Vich\UploadableField(mapping="inscription_pendant", fileNameProperty="document")
     * @var File
     */
    private $documentFile;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

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
}
