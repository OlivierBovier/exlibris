<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LignesCdeRepository")
 */
class LignesCde
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte_ligne_cde;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commandes", inversedBy="lignesCdes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Livres", inversedBy="lignesCdes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livre;

    /**
     * @ORM\Column(type="float")
     */
    private $prixParQte;

    public function __toString()
    {
        $id_string = $this->id;
        $setIdToString = settype($id_string, "string");
        return $id_string;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteLigneCde(): ?int
    {
        return $this->qte_ligne_cde;
    }

    public function setQteLigneCde(int $qte_ligne_cde): self
    {
        $this->qte_ligne_cde = $qte_ligne_cde;

        return $this;
    }

    public function getCommande(): ?Commandes
    {
        return $this->commande;
    }

    public function setCommande(?Commandes $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getLivre(): ?Livres
    {
        return $this->livre;
    }

    public function setLivre(?Livres $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    public function getPrixParQte(): ?float
    {
        return $this->prixParQte;
    }

    public function setPrixParQte(float $prixParQte): self
    {
        $this->prixParQte = $prixParQte;

        return $this;
    }
}
