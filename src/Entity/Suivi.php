<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuiviRepository::class)
 */
class Suivi
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reunion_de_demarrage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contrat_de_travaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ordre_de_service;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $implantation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dossiers_execution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pv_reception_provisoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pv_levee_de_reserves;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pv_reception_definitive;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rapport_annuel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rapport_final;
     
   /**
     * @ORM\ManyToOne(targetEntity=Projet::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReunionDeDemarrage(): ?string
    {
        return $this->reunion_de_demarrage;
    }

    public function setReunionDeDemarrage(string $reunion_de_demarrage): self
    {
        $this->reunion_de_demarrage = $reunion_de_demarrage;

        return $this;
    }

    public function getContratDeTravaux(): ?string
    {
        return $this->contrat_de_travaux;
    }

    public function setContratDeTravaux(?string $contrat_de_travaux): self
    {
        $this->contrat_de_travaux = $contrat_de_travaux;

        return $this;
    }

    public function getOrdreDeService(): ?string
    {
        return $this->ordre_de_service;
    }

    public function setOrdreDeService(?string $ordre_de_service): self
    {
        $this->ordre_de_service = $ordre_de_service;

        return $this;
    }

    public function getImplantation(): ?string
    {
        return $this->implantation;
    }

    public function setImplantation(?string $implantation): self
    {
        $this->implantation = $implantation;

        return $this;
    }

    public function getDossiersExecution(): ?string
    {
        return $this->dossiers_execution;
    }

    public function setDossiersExecution(?string $dossiers_execution): self
    {
        $this->dossiers_execution = $dossiers_execution;

        return $this;
    }

    public function getPvReceptionProvisoire(): ?string
    {
        return $this->pv_reception_provisoire;
    }

    public function setPvReceptionProvisoire(?string $pv_reception_provisoire): self
    {
        $this->pv_reception_provisoire = $pv_reception_provisoire;

        return $this;
    }

    public function getPvLeveeDeReserves(): ?string
    {
        return $this->pv_levee_de_reserves;
    }

    public function setPvLeveeDeReserves(?string $pv_levee_de_reserves): self
    {
        $this->pv_levee_de_reserves = $pv_levee_de_reserves;

        return $this;
    }

    public function getPvReceptionDefinitive(): ?string
    {
        return $this->pv_reception_definitive;
    }

    public function setPvReceptionDefinitive(?string $pv_reception_definitive): self
    {
        $this->pv_reception_definitive = $pv_reception_definitive;

        return $this;
    }

    public function getRapportAnnuel(): ?string
    {
        return $this->rapport_annuel;
    }

    public function setRapportAnnuel(?string $rapport_annuel): self
    {
        $this->rapport_annuel = $rapport_annuel;

        return $this;
    }

    public function getRapportFinal(): ?string
    {
        return $this->rapport_final;
    }

    public function setRapportFinal(?string $rapport_final): self
    {
        $this->rapport_final = $rapport_final;

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
}
