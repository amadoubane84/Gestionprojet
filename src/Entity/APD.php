<?php

namespace App\Entity;

use App\Repository\APDRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=APDRepository::class)
 */
class APD
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateapd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

   

    /**
     * @ORM\OneToOne(targetEntity=Projet::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;


     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateapd(): ?\DateTimeInterface
    {
        return $this->dateapd;
    }

    public function setDateapd(\DateTimeInterface $dateapd): self
    {
        $this->dateapd = $dateapd;

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


    public function getNomprojet(): ?Projet
    {
        return $this->nomprojet;
    }

    public function setNomprojet(Projet $nomprojet): self
    {
        $this->nomprojet = $nomprojet;

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
}
