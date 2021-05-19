<?php

namespace App\Entity;

use App\Repository\DAORepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DAORepository::class)
 */
class DAO
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
    private $datedao;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName;
  
    /**
     * @ORM\OneToOne(targetEntity=Projet::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedao(): ?\DateTimeInterface
    {
        return $this->datedao;
    }

    public function setDatedao(\DateTimeInterface $datedao): self
    {
        $this->datedao = $datedao;

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
    public function getNomprojet(): ?Projet
    {
        return $this->nomprojet;
    }

    public function setNomprojet(Projet $nomprojet): self
    {
        $this->nomprojet = $nomprojet;

        return $this;
    }
}
