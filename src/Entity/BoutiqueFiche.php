<?php

namespace App\Entity;

use App\Repository\BoutiqueFicheRepository;
use Doctrine\ORM\Mapping as ORM;
use Faker\Provider\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=BoutiqueFicheRepository::class)
 * @Vich\Uploadable
 */
class BoutiqueFiche
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
    private $fiche;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @Vich\UploadableField(mapping="boutique_fiche", fileNameProperty="fiche")
     * @var File
     */
    private $ficheFile;

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

    public function getFiche(): ?string
    {
        return $this->fiche;
    }

    public function setFiche(?string $fiche): self
    {
        $this->fiche = $fiche;

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

    public function getFicheFile()
    {
        return $this->ficheFile;
    }

    public function setFicheFile(\Symfony\Component\HttpFoundation\File\File $fiche = null)
    {
        $this->ficheFile = $fiche;

        if ($fiche) {
            $this->updatedAt = new \DateTime('now');
        }
    }
}
