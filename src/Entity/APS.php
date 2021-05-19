<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\APSRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=APSRepository::class)
 */
class APS
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateaps;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;


    /**
     * @ORM\OneToOne(targetEntity=Projet::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Titreprojet;

     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName;
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateaps(): ?\DateTimeInterface
    {
        return $this->dateaps;
    }

    public function setDateaps(?\DateTimeInterface $dateaps): self
    {
        $this->dateaps = $dateaps;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getBrochureFileName(): ?string
    {
        return $this->brochureFileName;
    }

    public function setBrochureFileName(string $brochureFileName): self
    {
        $this->brochureFileName = $brochureFileName;
        return $this;

    }  




    public function getTitreprojet(): ?Projet
    {
        return $this->Titreprojet;
    }

    public function setTitreprojet(Projet $Titreprojet): self
    {
        $this->Titreprojet = $Titreprojet;

        return $this;
    }

   
}
