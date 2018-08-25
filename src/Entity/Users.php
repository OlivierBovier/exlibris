<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom_user;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_user;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_user;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $cp_user;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $ville_user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $admin;

    /**
     * @ORM\Column(type="date")
     */
    private $date_crea_user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="user", orphanRemoval=true)
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commandes", mappedBy="user")
     */
    private $commandes;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenom_user;
    }

    public function setPrenomUser(string $prenom_user): self
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    public function getNomUser(): ?string
    {
        return $this->nom_user;
    }

    public function setNomUser(string $nom_user): self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user): self
    {
        $this->email_user = $email_user;

        return $this;
    }

    public function getAdresseUser(): ?string
    {
        return $this->adresse_user;
    }

    public function setAdresseUser(?string $adresse_user): self
    {
        $this->adresse_user = $adresse_user;

        return $this;
    }

    public function getCpUser(): ?string
    {
        return $this->cp_user;
    }

    public function setCpUser(?string $cp_user): self
    {
        $this->cp_user = $cp_user;

        return $this;
    }

    public function getVilleUser(): ?string
    {
        return $this->ville_user;
    }

    public function setVilleUser(?string $ville_user): self
    {
        $this->ville_user = $ville_user;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getDateCreaUser(): ?\DateTimeInterface
    {
        return $this->date_crea_user;
    }

    public function setDateCreaUser(\DateTimeInterface $date_crea_user): self
    {
        $this->date_crea_user = $date_crea_user;

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setUser($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
            // set the owning side to null (unless already changed)
            if ($avi->getUser() === $this) {
                $avi->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commandes[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commandes $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }
}
