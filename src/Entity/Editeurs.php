<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EditeursRepository")
 */
class Editeurs
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
    private $nom_editeur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Livres", mappedBy="editeur", orphanRemoval=true)
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

    public function __toString(){
        // to show the editor name in the select
        return $this->nom_editeur;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEditeur(): ?string
    {
        return $this->nom_editeur;
    }

    public function setNomEditeur(string $nom_editeur): self
    {
        $this->nom_editeur = $nom_editeur;

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
            $livre->setEditeur($this);
        }

        return $this;
    }

    public function removeLivre(Livres $livre): self
    {
        if ($this->livres->contains($livre)) {
            $this->livres->removeElement($livre);
            // set the owning side to null (unless already changed)
            if ($livre->getEditeur() === $this) {
                $livre->setEditeur(null);
            }
        }

        return $this;
    }
}
