<?php

namespace App\Entity;

use App\Repository\GrilleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GrilleRepository::class)]
class Grille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\GreaterThanOrEqual('today', message: 'La date soit être supérieur ou égale à aujourd\'hui !')]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;



    #[ORM\Column]
    private ?bool $tirageFait = null;

    #[ORM\ManyToOne(inversedBy: 'grilles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $joueur = null;

    #[Assert\GreaterThan(0, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\LessThan(50, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\NotEqualTo([], propertyPath: "num2", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num3", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num4", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num5", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[ORM\Column]
    private ?int $num1 = null;

    #[Assert\GreaterThan(0, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\LessThan(50, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\NotEqualTo([], propertyPath: "num1", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num3", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num4", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num5", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[ORM\Column]
    private ?int $num2 = null;

    #[Assert\GreaterThan(0, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\LessThan(50, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\NotEqualTo([], propertyPath: "num2", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num1", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num4", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num5", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[ORM\Column]
    private ?int $num3 = null;

    #[Assert\GreaterThan(0, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\LessThan(50, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\NotEqualTo([], propertyPath: "num2", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num3", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num1", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num5", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[ORM\Column]
    private ?int $num4 = null;

    #[Assert\GreaterThan(0, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\LessThan(50, message: 'Le numéro doit être compris entre 1 et 49 inclus !')]
    #[Assert\NotEqualTo([], propertyPath: "num2", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num3", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num4", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[Assert\NotEqualTo([], propertyPath: "num1", message: ('Vous ne pouvez pas saisir 2 fois le même numéro !'))]
    #[ORM\Column]
    private ?int $num5 = null;

    #[Assert\GreaterThan(0, message: 'Le numéro chance doit être compris entre 1 et 9 inclus !')]
    #[Assert\LessThan(10, message: 'Le numéro chance doit être compris entre 1 et 9 inclus !')]
    #[ORM\Column]
    private ?int $numChance = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }



    public function getNumChance(): ?int
    {
        return $this->numChance;
    }

    public function setNumChance(int $numChance): self
    {
        $this->numChance = $numChance;

        return $this;
    }

    public function isTirageFait(): ?bool
    {
        return $this->tirageFait;
    }

    public function setTirageFait(bool $tirageFait): self
    {
        $this->tirageFait = $tirageFait;

        return $this;
    }

    public function getJoueur(): ?User
    {
        return $this->joueur;
    }

    public function setJoueur(?User $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getNum1(): ?int
    {
        return $this->num1;
    }

    public function setNum1(int $num1): self
    {
        $this->num1 = $num1;

        return $this;
    }

    public function getNum2(): ?int
    {
        return $this->num2;
    }

    public function setNum2(int $num2): self
    {
        $this->num2 = $num2;

        return $this;
    }

    public function getNum3(): ?int
    {
        return $this->num3;
    }

    public function setNum3(int $num3): self
    {
        $this->num3 = $num3;

        return $this;
    }

    public function getNum4(): ?int
    {
        return $this->num4;
    }

    public function setNum4(int $num4): self
    {
        $this->num4 = $num4;

        return $this;
    }

    public function getNum5(): ?int
    {
        return $this->num5;
    }

    public function setNum5(int $num5): self
    {
        $this->num5 = $num5;

        return $this;
    }
}
