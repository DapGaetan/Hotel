<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomHotel = null;

    #[ORM\Column(length: 50)]
    private ?string $adresseHotel = null;

    #[ORM\Column(length: 10)]
    private ?int $nbSuiteHotel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomHotel(): ?string
    {
        return $this->nomHotel;
    }

    public function setNomHotel(string $nomHotel): self
    {
        $this->nomHotel = $nomHotel;

        return $this;
    }

    public function getAdresseHotel(): ?string
    {
        return $this->adresseHotel;
    }

    public function setAdresseHotel(string $adresseHotel): self
    {
        $this->adresseHotel = $adresseHotel;

        return $this;
    }

    public function getNbSuiteHotel(): ?int
    {
        return $this->nbSuiteHotel;
    }
}
