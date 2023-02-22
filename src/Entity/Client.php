<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nomClient = null;

    #[ORM\Column(length: 30)]
    private ?string $prenomClient = null;

    #[ORM\Column]
    private ?float $telClient = null;

    #[ORM\Column(length: 45)]
    private ?string $mailClient = null;

    #[ORM\Column]
    private ?float $ageClient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getTelClient(): ?float
    {
        return $this->telClient;
    }

    public function setTelClient(float $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->mailClient;
    }

    public function setMailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;

        return $this;
    }

    public function getAgeClient(): ?float
    {
        return $this->ageClient;
    }

    public function setAgeClient(float $ageClient): self
    {
        $this->ageClient = $ageClient;

        return $this;
    }
}
