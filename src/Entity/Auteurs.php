<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuteursRepository")
 */
class Auteurs
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
    private $prenom_auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_auteur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $biographie_auteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo_auteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Livres", mappedBy="auteur", orphanRemoval=true)
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

    public function __toString()
    {
        // to show the Name of the Auteur in the select
        return $this->getNomAuteur();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomAuteur(): ?string
    {
        return $this->prenom_auteur;
    }

    public function setPrenomAuteur(string $prenom_auteur): self
    {
        $this->prenom_auteur = $prenom_auteur;

        return $this;
    }

    public function getNomAuteur(): ?string
    {
        return $this->nom_auteur;
    }

    public function setNomAuteur(string $nom_auteur): self
    {
        $this->nom_auteur = $nom_auteur;

        return $this;
    }

    public function getBiographieAuteur(): ?string
    {
        return $this->biographie_auteur;
    }

    public function setBiographieAuteur(?string $biographie_auteur): self
    {
        $this->biographie_auteur = $biographie_auteur;

        return $this;
    }

    public function getPhotoAuteur(): ?string
    {
        return $this->photo_auteur;
    }

    public function setPhotoAuteur(?string $photo_auteur): self
    {
        $this->photo_auteur = $photo_auteur;

        return $this;
    }

    /**
     * @return Collection|Livres[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livres $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setAuteur($this);
        }

        return $this;
    }

    public function removeLivre(Livres $livre): self
    {
        if ($this->livres->contains($livre)) {
            $this->livres->removeElement($livre);
            // set the owning side to null (unless already changed)
            if ($livre->getAuteur() === $this) {
                $livre->setAuteur(null);
            }
        }

        return $this;
    }
}
