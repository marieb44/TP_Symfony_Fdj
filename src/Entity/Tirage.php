<?php

namespace App\Entity;

use App\Repository\TirageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TirageRepository::class)]
class Tirage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $num1 = null;

    #[ORM\Column]
    private ?int $num2 = null;

    #[ORM\Column]
    private ?int $num3 = null;

    #[ORM\Column]
    private ?int $num4 = null;

    #[ORM\Column]
    private ?int $num5 = null;

    #[ORM\Column]
    private ?int $numChance = null;

    #[ORM\Column]
    private ?int $mntJackpot = null;

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

    public function getNumChance(): ?int
    {
        return $this->numChance;
    }

    public function setNumChance(int $numChance): self
    {
        $this->numChance = $numChance;

        return $this;
    }

    public function getMntJackpot(): ?int
    {
        return $this->mntJackpot;
    }

    public function setMntJackpot(int $mntJackpot): self
    {
        $this->mntJackpot = $mntJackpot;

        return $this;
    }
}
