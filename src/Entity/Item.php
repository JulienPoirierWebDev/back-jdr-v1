<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
#[ApiResource()]
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure'])]
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $genericValue;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure'])]
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $usable;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $equipable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $modifier;

    /**
     * @ORM\ManyToOne(targetEntity=CaracteristicType::class, inversedBy="items")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $caracteristicType;

    /**
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="items")
     */
    private $userWhoCreate;

    /**
     * @ORM\ManyToOne(targetEntity=EquipmentType::class, inversedBy="items")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $equipmentType;

    /**
     * @ORM\OneToMany(targetEntity=Goal::class, mappedBy="targetItem")
     */
    private $goals;

    /**
     * @ORM\OneToMany(targetEntity=ItemInBag::class, mappedBy="item")
     */
    private $itemInBags;

    public function __construct()
    {
        $this->goals = new ArrayCollection();
        $this->itemInBags = new ArrayCollection();
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

    public function getGenericValue(): ?int
    {
        return $this->genericValue;
    }

    public function setGenericValue(?int $genericValue): self
    {
        $this->genericValue = $genericValue;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUsable(): ?bool
    {
        return $this->usable;
    }

    public function setUsable(bool $usable): self
    {
        $this->usable = $usable;

        return $this;
    }

    public function getEquipable(): ?bool
    {
        return $this->equipable;
    }

    public function setEquipable(bool $equipable): self
    {
        $this->equipable = $equipable;

        return $this;
    }

    public function getModifier(): ?int
    {
        return $this->modifier;
    }

    public function setModifier(?int $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getCaracteristicType(): ?CaracteristicType
    {
        return $this->caracteristicType;
    }

    public function setCaracteristicType(?CaracteristicType $caracteristicType): self
    {
        $this->caracteristicType = $caracteristicType;

        return $this;
    }

    public function getUserCreation(): ?bool
    {
        return $this->userCreation;
    }

    public function setUserCreation(bool $userCreation): self
    {
        $this->userCreation = $userCreation;

        return $this;
    }

    public function getUserWhoCreate(): ?User
    {
        return $this->userWhoCreate;
    }

    public function setUserWhoCreate(?User $userWhoCreate): self
    {
        $this->userWhoCreate = $userWhoCreate;

        return $this;
    }

    public function getEquipmentType(): ?EquipmentType
    {
        return $this->equipmentType;
    }

    public function setEquipmentType(?EquipmentType $equipmentType): self
    {
        $this->equipmentType = $equipmentType;

        return $this;
    }

    /**
     * @return Collection|Goal[]
     */
    public function getGoals(): Collection
    {
        return $this->goals;
    }

    public function addGoal(Goal $goal): self
    {
        if (!$this->goals->contains($goal)) {
            $this->goals[] = $goal;
            $goal->setTargetItem($this);
        }

        return $this;
    }

    public function removeGoal(Goal $goal): self
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getTargetItem() === $this) {
                $goal->setTargetItem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ItemInBag[]
     */
    public function getItemInBags(): Collection
    {
        return $this->itemInBags;
    }

    public function addItemInBag(ItemInBag $itemInBag): self
    {
        if (!$this->itemInBags->contains($itemInBag)) {
            $this->itemInBags[] = $itemInBag;
            $itemInBag->setItem($this);
        }

        return $this;
    }

    public function removeItemInBag(ItemInBag $itemInBag): self
    {
        if ($this->itemInBags->removeElement($itemInBag)) {
            // set the owning side to null (unless already changed)
            if ($itemInBag->getItem() === $this) {
                $itemInBag->setItem(null);
            }
        }

        return $this;
    }
}
