<?php

namespace App\Entity;

use App\Repository\PvmensuelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PvmensuelRepository::class)
 */
class Pvmensuel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
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
    private $label;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
