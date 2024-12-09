<?php

namespace App\Entity;

use App\Repository\AquariumRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AquariumRepository::class)]
class Aquarium
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Contenance = null;

    #[ORM\Column(length: 50)]
    private ?string $Matiere = null;

    #[ORM\Column]
    private ?int $Dimensions = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Accessoire = null;

    #[ORM\Column]
    private ?int $Poid = null;

    #[ORM\Column(length: 20)]
    private ?string $Marque = null;

    #[ORM\ManyToOne(inversedBy: 'aquaria')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marques $id_marque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getContenance(): ?int
    {
        return $this->Contenance;
    }

    public function setContenance(int $Contenance): static
    {
        $this->Contenance = $Contenance;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->Matiere;
    }

    public function setMatiere(string $Matiere): static
    {
        $this->Matiere = $Matiere;

        return $this;
    }

    public function getDimensions(): ?int
    {
        return $this->Dimensions;
    }

    public function setDimensions(int $Dimensions): static
    {
        $this->Dimensions = $Dimensions;

        return $this;
    }

    public function isAccessoire(): ?bool
    {
        return $this->Accessoire;
    }

    public function setAccessoire(?bool $Accessoire): static
    {
        $this->Accessoire = $Accessoire;

        return $this;
    }

    public function getPoid(): ?int
    {
        return $this->Poid;
    }

    public function setPoid(int $Poid): static
    {
        $this->Poid = $Poid;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): static
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getIdMarque(): ?Marques
    {
        return $this->id_marque;
    }

    public function setIdMarque(?Marques $id_marque): static
    {
        $this->id_marque = $id_marque;

        return $this;
    }
}
