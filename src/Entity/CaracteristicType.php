<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CaracteristicTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CaracteristicTypeRepository::class)
 */
#[ApiResource()]
class CaracteristicType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure','read:GroupOfCharacters'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure','read:GroupOfCharacters'])]
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Caracteristic::class, mappedBy="caracteristicType", orphanRemoval=true)
     */
    private $caracteristics;

    /**
     * @ORM\OneToMany(targetEntity=Spell::class, mappedBy="caracteristicType")
     */
    private $spells;

    /**
     * @ORM\OneToMany(targetEntity=Power::class, mappedBy="carecteristicType")
     */
    private $powers;

    /**
     * @ORM\OneToMany(targetEntity=Race::class, mappedBy="caracteristicType")
     */
    private $races;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="caracteristicType")
     */
    private $items;

    /**
     * @ORM\OneToMany(targetEntity=DiceThrow::class, mappedBy="cararcteristicType")
     */
    private $diceThrows;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forCreation;

    public function __construct()
    {
        $this->caracteristics = new ArrayCollection();
        $this->spells = new ArrayCollection();
        $this->powers = new ArrayCollection();
        $this->races = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->diceThrows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Caracteristic[]
     */
    public function getCaracteristics(): Collection
    {
        return $this->caracteristics;
    }

    public function addCaracteristic(Caracteristic $caracteristic): self
    {
        if (!$this->caracteristics->contains($caracteristic)) {
            $this->caracteristics[] = $caracteristic;
            $caracteristic->setCaracteristicType($this);
        }

        return $this;
    }

    public function removeCaracteristic(Caracteristic $caracteristic): self
    {
        if ($this->caracteristics->removeElement($caracteristic)) {
            // set the owning side to null (unless already changed)
            if ($caracteristic->getCaracteristicType() === $this) {
                $caracteristic->setCaracteristicType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Spell[]
     */
    public function getSpells(): Collection
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): self
    {
        if (!$this->spells->contains($spell)) {
            $this->spells[] = $spell;
            $spell->setCaracteristicType($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): self
    {
        if ($this->spells->removeElement($spell)) {
            // set the owning side to null (unless already changed)
            if ($spell->getCaracteristicType() === $this) {
                $spell->setCaracteristicType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Power[]
     */
    public function getPowers(): Collection
    {
        return $this->powers;
    }

    public function addPower(Power $power): self
    {
        if (!$this->powers->contains($power)) {
            $this->powers[] = $power;
            $power->setCarecteristicType($this);
        }

        return $this;
    }

    public function removePower(Power $power): self
    {
        if ($this->powers->removeElement($power)) {
            // set the owning side to null (unless already changed)
            if ($power->getCarecteristicType() === $this) {
                $power->setCarecteristicType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Race[]
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    public function addRace(Race $race): self
    {
        if (!$this->races->contains($race)) {
            $this->races[] = $race;
            $race->setCaracteristicType($this);
        }

        return $this;
    }

    public function removeRace(Race $race): self
    {
        if ($this->races->removeElement($race)) {
            // set the owning side to null (unless already changed)
            if ($race->getCaracteristicType() === $this) {
                $race->setCaracteristicType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setCaracteristicType($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getCaracteristicType() === $this) {
                $item->setCaracteristicType(null);
            }
        }

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
            $diceThrow->setCararcteristicType($this);
        }

        return $this;
    }

    public function removeDiceThrow(DiceThrow $diceThrow): self
    {
        if ($this->diceThrows->removeElement($diceThrow)) {
            // set the owning side to null (unless already changed)
            if ($diceThrow->getCararcteristicType() === $this) {
                $diceThrow->setCararcteristicType(null);
            }
        }

        return $this;
    }

    public function getForCreation(): ?bool
    {
        return $this->forCreation;
    }

    public function setForCreation(bool $forCreation): self
    {
        $this->forCreation = $forCreation;

        return $this;
    }
}
