<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Hauteur = null;

    #[ORM\Column]
    private ?int $Largeur = null;

    #[ORM\Column]
    private ?int $Longueur = null;

    #[ORM\Column]
    private ?int $Poids = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHauteur(): ?int
    {
        return $this->Hauteur;
    }

    public function setHauteur(int $Hauteur): static
    {
        $this->Hauteur = $Hauteur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->Largeur;
    }

    public function setLargeur(int $Largeur): static
    {
        $this->Largeur = $Largeur;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->Longueur;
    }

    public function setLongueur(int $Longueur): static
    {
        $this->Longueur = $Longueur;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->Poids;
    }

    public function setPoids(int $Poids): static
    {
        $this->Poids = $Poids;

        return $this;
    }
}
