<?php

namespace App\Entity;

use App\Repository\TelechargementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelechargementRepository::class)
 */
class Telechargement
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
    private $Nom;

       /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $brochureFileName;
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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
