<?php

namespace App\Entity;

use App\Repository\SommaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SommaireRepository::class)
 */
class Sommaire
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
    private $reuniondemarrage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $implantation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $compterendu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Rpartielle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Rprovisioire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Rdefinitive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReuniondemarrage(): ?string
    {
        return $this->reuniondemarrage;
    }

    public function setReuniondemarrage(string $reuniondemarrage): self
    {
        $this->reuniondemarrage = $reuniondemarrage;

        return $this;
    }

    public function getImplantation(): ?string
    {
        return $this->implantation;
    }

    public function setImplantation(string $implantation): self
    {
        $this->implantation = $implantation;

        return $this;
    }

    public function getCompterendu(): ?string
    {
        return $this->compterendu;
    }

    public function setCompterendu(string $compterendu): self
    {
        $this->compterendu = $compterendu;

        return $this;
    }

    public function getRpartielle(): ?string
    {
        return $this->Rpartielle;
    }

    public function setRpartielle(string $Rpartielle): self
    {
        $this->Rpartielle = $Rpartielle;

        return $this;
    }

    public function getRprovisioire(): ?string
    {
        return $this->Rprovisioire;
    }

    public function setRprovisioire(string $Rprovisioire): self
    {
        $this->Rprovisioire = $Rprovisioire;

        return $this;
    }

    public function getRdefinitive(): ?string
    {
        return $this->Rdefinitive;
    }

    public function setRdefinitive(string $Rdefinitive): self
    {
        $this->Rdefinitive = $Rdefinitive;

        return $this;
    }
}
