<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiceRepository::class)
 */
#[ApiResource()]
class Dice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dicename;

    /**
     * @ORM\Column(type="integer")
     */
    private $min;

    /**
     * @ORM\Column(type="integer")
     */
    private $max;

    /**
     * @ORM\OneToMany(targetEntity=DiceThrow::class, mappedBy="dice")
     */
    private $diceThrows;

    public function __construct()
    {
        $this->diceThrows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDicename(): ?string
    {
        return $this->dicename;
    }

    public function setDicename(string $dicename): self
    {
        $this->dicename = $dicename;

        return $this;
    }

    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @return Collection|DiceThrow[]
     */
    public function getDiceThrows(): Collection
    {
        return $this->diceThrows;
    }

    public function addDiceThrow(DiceThrow $diceThrow): self
    {
        if (!$this->diceThrows->contains($diceThrow)) {
            $this->diceThrows[] = $diceThrow;
            $diceThrow->setDice($this);
        }

        return $this;
    }

    public function removeDiceThrow(DiceThrow $diceThrow): self
    {
        if ($this->diceThrows->removeElement($diceThrow)) {
            // set the owning side to null (unless already changed)
            if ($diceThrow->getDice() === $this) {
                $diceThrow->setDice(null);
            }
        }

        return $this;
    }
}
