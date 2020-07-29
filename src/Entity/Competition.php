<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
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
    private $sport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=CompetitionInscrit::class, mappedBy="competition")
     */
    private $competitionInscrits;

    public function __construct()
    {
        $this->competitionInscrits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(string $sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|CompetitionInscrit[]
     */
    public function getCompetitionInscrits(): Collection
    {
        return $this->competitionInscrits;
    }

    public function addCompetitionInscrit(CompetitionInscrit $competitionInscrit): self
    {
        if (!$this->competitionInscrits->contains($competitionInscrit)) {
            $this->competitionInscrits[] = $competitionInscrit;
            $competitionInscrit->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetitionInscrit(CompetitionInscrit $competitionInscrit): self
    {
        if ($this->competitionInscrits->contains($competitionInscrit)) {
            $this->competitionInscrits->removeElement($competitionInscrit);
            // set the owning side to null (unless already changed)
            if ($competitionInscrit->getCompetition() === $this) {
                $competitionInscrit->setCompetition(null);
            }
        }

        return $this;
    }

}
