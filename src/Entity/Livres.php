<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LivresRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Livres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=17)
     * @Assert\Isbn(
     *     type = "isbn13",
     *     message = "Ce n'est pas un code Isbn valide."
     * )
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_pages;

    /**
     * @ORM\Column(type="date")
     */
    private $date_parution;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_ttc;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_conseil;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="livres_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Auteurs", inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Editeurs", inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editeur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MouvStock", mappedBy="livre", orphanRemoval=true)
     */
    private $mouvStocks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Avis", mappedBy="livre", orphanRemoval=true)
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LignesCde", mappedBy="livre")
     */
    private $lignesCdes;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="livres")
     */
    private $categorie;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $note_moyenne;


    public function __construct()
    {
        $this->mouvStocks = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->lignesCdes = new ArrayCollection();
        $this->note_moyenne = 0;
    }

    public function __toString()
    {
        // to show the title of the book in the select
        return $this->titre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
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

    public function getNbPages(): ?int
    {
        return $this->nb_pages;
    }

    public function setNbPages(int $nb_pages): self
    {
        $this->nb_pages = $nb_pages;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->date_parution;
    }

    public function setDateParution(\DateTimeInterface $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    public function getPrixTtc(): ?float
    {
        return $this->prix_ttc;
    }

    public function setPrixTtc(float $prix_ttc): self
    {
        $this->prix_ttc = $prix_ttc;

        return $this;
    }

    public function getEstConseil(): ?bool
    {
        return $this->est_conseil;
    }

    public function setEstConseil(bool $est_conseil): self
    {
        $this->est_conseil = $est_conseil;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getAuteur(): ?Auteurs
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteurs $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getEditeur(): ?Editeurs
    {
        return $this->editeur;
    }

    public function setEditeur(?Editeurs $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * @return Collection|MouvStock[]
     */
    public function getMouvStocks(): Collection
    {
        return $this->mouvStocks;
    }

    public function addMouvStock(MouvStock $mouvStock): self
    {
        if (!$this->mouvStocks->contains($mouvStock)) {
            $this->mouvStocks[] = $mouvStock;
            $mouvStock->setLivre($this);
        }

        return $this;
    }

    public function removeMouvStock(MouvStock $mouvStock): self
    {
        if ($this->mouvStocks->contains($mouvStock)) {
            $this->mouvStocks->removeElement($mouvStock);
            // set the owning side to null (unless already changed)
            if ($mouvStock->getLivre() === $this) {
                $mouvStock->setLivre(null);
            }
        }

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
            $avi->setLivre($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->contains($avi)) {
            $this->avis->removeElement($avi);
            // set the owning side to null (unless already changed)
            if ($avi->getLivre() === $this) {
                $avi->setLivre(null);
            }
        }

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
            $lignesCde->setLivre($this);
        }

        return $this;
    }

    public function removeLignesCde(LignesCde $lignesCde): self
    {
        if ($this->lignesCdes->contains($lignesCde)) {
            $this->lignesCdes->removeElement($lignesCde);
            // set the owning side to null (unless already changed)
            if ($lignesCde->getLivre() === $this) {
                $lignesCde->setLivre(null);
            }
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());
    }

    public function setUpdatedAt(\Datetime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNoteMoyenne(): ?float
    {
        return $this->note_moyenne;
    }

    public function setNoteMoyenne(?float $note_moyenne): self
    {
        $this->note_moyenne = $note_moyenne;

        return $this;
    }

}
