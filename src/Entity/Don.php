<?php

namespace App\Entity;

use App\Repository\DonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DonRepository::class)]
class Don
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[Assert\NotBlank(message:" le nom doit etre non vide")]
    #[Assert\Length( min : 2,minMessage:" Entrer  nom au mini de 2 caracteres"
    
        )
    ]
    #[ORM\Column(length: 255)]
    private ?string $nom = null;


    #[Assert\NotBlank(message:" le prenom doit etre non vide")]
    #[Assert\Length( min : 2,minMessage:" Entrer prenom au mini de 2 caracteres"
    
        )
    ]


    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[Assert\NotBlank(message:" id Utilisateur doit etre non vide")]
    #[Assert\Length( min : 2,max :20,minMessage:" Entrer  id Utilisateur au mini de 4 caracteres au max 20",maxMessage:"doit etre <=20"
    
    )
]

    #[ORM\Column]
    private ?int $idUtilisateur = null;
    #[Assert\Email( message:" email'{{valeur}} non valide " )]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;
    #[Assert\NotBlank(message:" id Association doit etre non vide")]
    #[Assert\Length( min : 1,minMessage:" Entrer  id Association au mini de 4 caracteres "
    
    )
]
    #[ORM\Column]
    private ?int $idAssociation = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): static
    {
        $this->idUtilisateur = $idUtilisateur;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getIdAssociation(): ?int
    {
        return $this->idAssociation;
    }

    public function setIdAssociation(int $idAssociation): static
    {
        $this->idAssociation = $idAssociation;

        return $this;
    }
}
