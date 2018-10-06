<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandesRepository")
 */
class Commandes
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
    private $date_cde;

    /**
     * @ORM\Column(type="float")
     */
    private $total_ht_cde;

    /**
     * @ORM\Column(type="float")
     */
    private $tva_cde;

    /**
     * @ORM\Column(type="float")
     */
    private $total_ttc_cde;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LignesCde", mappedBy="commande", cascade={"persist", "remove"})
     */
    private $lignesCdes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $remise;

    public function __construct()
    {
        $this->lignesCdes = new ArrayCollection();
        $this->remise = 0;
    }

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

    public function getDateCde(): ?\DateTimeInterface
    {
        return $this->date_cde;
    }

    public function setDateCde(\DateTimeInterface $date_cde): self
    {
        $this->date_cde = $date_cde;

        return $this;
    }

    public function getTotalHtCde(): ?float
    {
        return $this->total_ht_cde;
    }

    public function setTotalHtCde(float $total_ht_cde): self
    {
        $this->total_ht_cde = $total_ht_cde;

        return $this;
    }

    public function getTvaCde(): ?float
    {
        return $this->tva_cde;
    }

    public function setTvaCde(float $tva_cde): self
    {
        $this->tva_cde = $tva_cde;

        return $this;
    }

    public function getTotalTtcCde(): ?float
    {
        return $this->total_ttc_cde;
    }

    public function setTotalTtcCde(float $total_ttc_cde): self
    {
        $this->total_ttc_cde = $total_ttc_cde;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|LignesCde[]
     */
    public function getLignesCdes(): Collection
    {
        return $this->lignesCdes;
    }

    public function addLignesCde(LignesCde $lignesCde): self
    {
        if (!$this->lignesCdes->contains($lignesCde)) {
            $this->lignesCdes[] = $lignesCde;
            $lignesCde->setCommande($this);
        }

        return $this;
    }

    public function removeLignesCde(LignesCde $lignesCde): self
    {
        if ($this->lignesCdes->contains($lignesCde)) {
            $this->lignesCdes->removeElement($lignesCde);
            // set the owning side to null (unless already changed)
            if ($lignesCde->getCommande() === $this) {
                $lignesCde->setCommande(null);
            }
        }

        return $this;
    }

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(?int $remise): self
    {
        $this->remise = $remise;

        return $this;
    }
}
