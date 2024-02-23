<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
class Association
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[Assert\Length( min : 2,minMessage:" Entrer  nom au mini de 2 caracteres"
    
    )
]
    #[ORM\Column(length: 255)]
    private ?string $nom = null;
    #[Assert\NotBlank(message:" le telephone doit etre non vide")]
    #[ORM\Column]
    private ?int $telephone = null;
    #[Assert\Email( message:" email'{{valeur}} non valide " )]
    #[ORM\Column(length: 255)]
    private ?string $email = null;
    #[Assert\NotBlank(message:" le lieu doit etre non vide")]
    #[ORM\Column(length: 255)]
    private ?string $lieu = null;
    #[Assert\Length( min : 1,max :13,minMessage:" Entrer  codePostal au mini de 1 caractere",maxMessage:"doit etre <=13" )]
    #[ORM\Column]
    private ?int $codePostal = null;
    #[Assert\NotBlank(message:" la description doit etre non vide")]
    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
