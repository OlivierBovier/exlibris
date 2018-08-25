<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MouvStockRepository")
 */
class MouvStock
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
    private $qte_mouv;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_mouv;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Livres", inversedBy="mouvStocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteMouv(): ?int
    {
        return $this->qte_mouv;
    }

    public function setQteMouv(int $qte_mouv): self
    {
        $this->qte_mouv = $qte_mouv;

        return $this;
    }

    public function getDateMouv(): ?\DateTimeInterface
    {
        return $this->date_mouv;
    }

    public function setDateMouv(\DateTimeInterface $date_mouv): self
    {
        $this->date_mouv = $date_mouv;

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
}
