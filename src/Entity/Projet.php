<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titreprojet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Maitreouvrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Entreprise;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Dateos;

    /**
     * @ORM\Column(type="date")
     */
    private $Datefincontrat;

    /**
     * @ORM\Column(type="integer")
     */
    private $site;


  
    
    
    public function __toString(): string
    {

        return $this->Titreprojet;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreprojet(): ?string
    {
        return $this->Titreprojet;
    }

    public function setTitreprojet(string $Titreprojet): self
    {
        $this->Titreprojet = $Titreprojet;

        return $this;
    }

    public function getMaitreouvrage(): ?string
    {
        return $this->Maitreouvrage;
    }

    public function setMaitreouvrage(string $Maitreouvrage): self
    {
        $this->Maitreouvrage = $Maitreouvrage;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->Entreprise;
    }

    public function setEntreprise(string $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }

    public function getDateos(): ?\DateTimeInterface
    {
        return $this->Dateos;
    }

    public function setDateos(?\DateTimeInterface $Dateos): self
    {
        $this->Dateos = $Dateos;

        return $this;
    }

    public function getDatefincontrat(): ?\DateTimeInterface
    {
        return $this->Datefincontrat;
    }

    public function setDatefincontrat(\DateTimeInterface $Datefincontrat): self
    {
        $this->Datefincontrat = $Datefincontrat;

        return $this;
    }

    public function getSite(): ?int
    {
        return $this->site;
    }

    public function setSite(int $site): self
    {
        $this->site = $site;

        return $this;
    }
}
