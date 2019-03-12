<?php

namespace App\Entity;

use App\Entity\Competence;
use App\Entity\Candidature;
use App\Entity\Traits\LogTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreRepository")
 */
class Offre
{
    use LogTrait;

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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidature", mappedBy="idOffre")
     */
    private $candidatures;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Competence", inversedBy="offres")
     */
    public $idCompetence;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job", inversedBy="offres")
     */
    public $idJob;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
        $this->idCompetence = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Candidature[]
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setIdOffre($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->contains($candidature)) {
            $this->candidatures->removeElement($candidature);
            // set the owning side to null (unless already changed)
            if ($candidature->getIdOffre() === $this) {
                $candidature->setIdOffre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getIdCompetence(): Collection
    {
        return $this->idCompetence;
    }

    public function addIdCompetence(Competence $idCompetence): self
    {
        if (!$this->idCompetence->contains($idCompetence)) {
            $this->idCompetence[] = $idCompetence;
        }

        return $this;
    }

    public function removeIdCompetence(Competence $idCompetence): self
    {
        if ($this->idCompetence->contains($idCompetence)) {
            $this->idCompetence->removeElement($idCompetence);
        }

        return $this;
    }

    public function getIdJob(): ?Job
    {
        return $this->idJob;
    }

    public function setIdJob(?Job $idJob): self
    {
        $this->idJob = $idJob;

        return $this;
    }
}
