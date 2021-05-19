<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $lieusite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contact;

    /**
     * @ORM\OneToOne(targetEntity=Projet::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getLieusite(): ?string
    {
        return $this->lieusite;
    }

    public function setLieusite(string $lieusite): self
    {
        $this->lieusite = $lieusite;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getContact(): ?int
    {
        return $this->contact;
    }

    public function setContact(?int $contact): self
    {
        $this->contact = $contact;

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
