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
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contrat_de_travaux;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ordre_de_service;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $implantation;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dossiers_execution;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pv_reception_provisoire;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pv_levee_de_reserves;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pv_reception_definitive;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rapport_annuel;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rapport_final;
    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName9;
     
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

    public function getBrochureFileName(): ?string
    {
        return $this->brochureFileName;
    }

    public function setBrochureFileName(string $brochureFileName): self
    {
        $this->brochureFileName = $brochureFileName;
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
    public function getBrochureFileName1(): ?string
    {
        return $this->brochureFileName1;
    }

    public function setBrochureFileName1(string $brochureFileName1): self
    {
        $this->brochureFileName1 = $brochureFileName1;
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
    public function getBrochureFileName2(): ?string
    {
        return $this->brochureFileName2;
    }

    public function setBrochureFileName2(string $brochureFileName2): self
    {
        $this->brochureFileName2 = $brochureFileName2;
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
    public function getBrochureFileName3(): ?string
    {
        return $this->brochureFileName3;
    }

    public function setBrochureFileName3(string $brochureFileName3): self
    {
        $this->brochureFileName3 = $brochureFileName3;
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
    public function getBrochureFileName4(): ?string
    {
        return $this->brochureFileName4;
    }

    public function setBrochureFileName4(string $brochureFileName4): self
    {
        $this->brochureFileName4 = $brochureFileName4;
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
    public function getBrochureFileName5(): ?string
    {
        return $this->brochureFileName5;
    }

    public function setBrochureFileName5(string $brochureFileName5): self
    {
        $this->brochureFileName5 = $brochureFileName5;
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
    public function getBrochureFileName6(): ?string
    {
        return $this->brochureFileName6;
    }

    public function setBrochureFileName6(string $brochureFileName6): self
    {
        $this->brochureFileName6 = $brochureFileName6;
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
    public function getBrochureFileName7(): ?string
    {
        return $this->brochureFileName7;
    }

    public function setBrochureFileName7(string $brochureFileName7): self
    {
        $this->brochureFileName7 = $brochureFileName7;
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
    public function getBrochureFileName8(): ?string
    {
        return $this->brochureFileName8;
    }

    public function setBrochureFileName8(string $brochureFileName8): self
    {
        $this->brochureFileName8 = $brochureFileName8;
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
    public function getBrochureFileName9(): ?string
    {
        return $this->brochureFileName9;
    }

    public function setBrochureFileName9(string $brochureFileName9): self
    {
        $this->brochureFileName9 = $brochureFileName9;
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
