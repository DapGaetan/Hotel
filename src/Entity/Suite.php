<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SuiteRepository::class)]
#[UniqueEntity('titre')]
class Suite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 20)]
    private ?string $titre = null;

    #[ORM\Column(length: 60)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 60)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 10, max: 100)]
    private ?string $galerieImage = null;

    #[ORM\Column]
    #[Assert\Positive()]
    #[Assert\NotNull()]
    #[Assert\LessThan(1500)]
    private ?float $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGalerieImage(): ?string
    {
        return $this->galerieImage;
    }

    public function setGalerieImage(string $galerieImage): self
    {
        $this->galerieImage = $galerieImage;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
