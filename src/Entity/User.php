<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $Nom = null;

    #[ORM\Column(length: 30)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 30)]
    private ?string $Mail = null;

    #[ORM\Column(length: 20)]
    private ?string $Role = null;

    #[ORM\Column(length: 10)]
    private ?string $Telephone = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commande::class)]
    private Collection $commande;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: AdresseUser::class)]
    private Collection $adresseUser;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Preferences $preferences = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Login $login = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Connexion::class)]
    private Collection $connexion;

    public function __construct()
    {
        $this->commande = new ArrayCollection();
        $this->adresseUser = new ArrayCollection();
        $this->connexion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): static
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(string $Role): static
    {
        $this->Role = $Role;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): static
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commande->contains($commande)) {
            $this->commande->add($commande);
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commande->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdresseUser>
     */
    public function getAdresseUser(): Collection
    {
        return $this->adresseUser;
    }

    public function addAdresseUser(AdresseUser $adresseUser): static
    {
        if (!$this->adresseUser->contains($adresseUser)) {
            $this->adresseUser->add($adresseUser);
            $adresseUser->setUser($this);
        }

        return $this;
    }

    public function removeAdresseUser(AdresseUser $adresseUser): static
    {
        if ($this->adresseUser->removeElement($adresseUser)) {
            // set the owning side to null (unless already changed)
            if ($adresseUser->getUser() === $this) {
                $adresseUser->setUser(null);
            }
        }

        return $this;
    }

    public function getPreferences(): ?Preferences
    {
        return $this->preferences;
    }

    public function setPreferences(?Preferences $preferences): static
    {
        $this->preferences = $preferences;

        return $this;
    }

    public function getLogin(): ?Login
    {
        return $this->login;
    }

    public function setLogin(Login $login): static
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return Collection<int, Connexion>
     */
    public function getConnexion(): Collection
    {
        return $this->connexion;
    }

    public function addConnexion(Connexion $connexion): static
    {
        if (!$this->connexion->contains($connexion)) {
            $this->connexion->add($connexion);
            $connexion->setUser($this);
        }

        return $this;
    }

    public function removeConnexion(Connexion $connexion): static
    {
        if ($this->connexion->removeElement($connexion)) {
            // set the owning side to null (unless already changed)
            if ($connexion->getUser() === $this) {
                $connexion->setUser(null);
            }
        }

        return $this;
    }
}
