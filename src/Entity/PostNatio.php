<?php

namespace App\Entity;

use App\Repository\PostNatioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PostNatioRepository::class)
 * @Vich\Uploadable
 */
class PostNatio
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    private $imagesField;

    /**
     * @ORM\OneToMany(targetEntity=PostNatioImage::class, mappedBy="postNatio", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=PostNatioDocument::class, mappedBy="postNatio", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $documents;

    /**
     * @ORM\Column(type="boolean")
     */
    private $carrousel;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

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

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return Collection|PostNatioImage[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(PostNatioImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setPostNatio($this);
        }

        return $this;
    }

    public function removeImage(PostNatioImage $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getPostNatio() === $this) {
                $image->setPostNatio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PostNatioDocument[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(PostNatioDocument $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setPostNatio($this);
        }

        return $this;
    }

    public function removeDocument(PostNatioDocument $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getPostNatio() === $this) {
                $document->setPostNatio(null);
            }
        }

        return $this;
    }

    public function getCarrousel(): ?bool
    {
        return $this->carrousel;
    }

    public function setCarrousel(bool $carrousel): self
    {
        $this->carrousel = $carrousel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagesField()
    {
        return $this->imagesField;
    }

    /**
     * @param mixed $imagesField
     */
    public function setImagesField($imagesField): void
    {
        $this->imagesField = $imagesField;
    }
}
