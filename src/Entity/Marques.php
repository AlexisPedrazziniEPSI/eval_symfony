<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarquesRepository::class)]
class Marques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    /**
     * @var Collection<int, Aquarium>
     */
    #[ORM\OneToMany(targetEntity: Aquarium::class, mappedBy: 'id_marque', orphanRemoval: true)]
    private Collection $aquaria;

    public function __construct()
    {
        $this->aquaria = new ArrayCollection();
    }

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

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Aquarium>
     */
    public function getAquaria(): Collection
    {
        return $this->aquaria;
    }

    public function addAquarium(Aquarium $aquarium): static
    {
        if (!$this->aquaria->contains($aquarium)) {
            $this->aquaria->add($aquarium);
            $aquarium->setIdMarque($this);
        }

        return $this;
    }

    public function removeAquarium(Aquarium $aquarium): static
    {
        if ($this->aquaria->removeElement($aquarium)) {
            // set the owning side to null (unless already changed)
            if ($aquarium->getIdMarque() === $this) {
                $aquarium->setIdMarque(null);
            }
        }

        return $this;
    }
}
