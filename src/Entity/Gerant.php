<?php

namespace App\Entity;

use App\Repository\GerantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GerantRepository::class)]
class Gerant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nomGerant = null;

    #[ORM\Column(length: 30)]
    private ?string $prenomGerant = null;

    #[ORM\Column(length: 30)]
    private ?string $mailGerant = null;

    #[ORM\Column(length: 30)]
    private ?string $mdpGerant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGerant(): ?string
    {
        return $this->nomGerant;
    }

    public function setNomGerant(string $nomGerant): self
    {
        $this->nomGerant = $nomGerant;

        return $this;
    }

    public function getPrenomGerant(): ?string
    {
        return $this->prenomGerant;
    }

    public function setPrenomGerant(string $prenomGerant): self
    {
        $this->prenomGerant = $prenomGerant;

        return $this;
    }

    public function getMailGerant(): ?string
    {
        return $this->mailGerant;
    }

    public function setMailGerant(string $mailGerant): self
    {
        $this->mailGerant = $mailGerant;

        return $this;
    }

    public function getMdpGerant(): ?string
    {
        return $this->mdpGerant;
    }

    public function setMdpGerant(string $mdpGerant): self
    {
        $this->mdpGerant = $mdpGerant;

        return $this;
    }
}
