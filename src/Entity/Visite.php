<?php

namespace App\Entity;

use App\Repository\VisiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisiteRepository::class)
 */
class Visite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Visite;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;
      

     /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;
    const CHOIX = [
        0=>'En cours',
        1=>'Acceptée',
        2=>'Refusée',
    ];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisite(): ?int
    {
        return $this->Visite;
    }

    public function setVisite(int $Visite): self
    {
        $this->Visite = $Visite;

        return $this;
    }

    public function getNomprojet(): ?Projet
    {
        return $this->nomprojet;
    }

    public function setNomprojet(?Projet $nomprojet): self
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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }  

}
