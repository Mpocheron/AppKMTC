<?php

namespace App\Entity;

use App\Repository\PreferencesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreferencesRepository::class)]
class Preferences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $telephone = null;

    #[ORM\Column(nullable: true)]
    private ?bool $mail = null;

    #[ORM\Column(nullable: true)]
    private ?bool $push = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTelephone(): ?bool
    {
        return $this->telephone;
    }

    public function setTelephone(?bool $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function isMail(): ?bool
    {
        return $this->mail;
    }

    public function setMail(?bool $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function isPush(): ?bool
    {
        return $this->push;
    }

    public function setPush(?bool $push): static
    {
        $this->push = $push;

        return $this;
    }
}
