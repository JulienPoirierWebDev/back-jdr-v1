<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\ItemInBagByAdventureController;
use App\Repository\ItemInBagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ItemInBagRepository::class)
 */
#[ApiResource(
    itemOperations: [
        'get',
        'delete',
        'put',
        'patch'
    ],
    collectionOperations: [
        'get',
        "post",
        'put'
    ]
)]class ItemInBag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="itemInBags")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerCharacter;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity=ItemInAction::class, mappedBy="itemInBag")
     */
    private $itemInActions;

    /**
     * @ORM\OneToMany(targetEntity=Equipment::class, mappedBy="itemInBag")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $equipment;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="itemInBags")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $item;

    public function __construct()
    {
        $this->itemInActions = new ArrayCollection();
        $this->equipment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerCharacter(): ?PlayerCharacter
    {
        return $this->playerCharacter;
    }

    public function setPlayerCharacter(?PlayerCharacter $playerCharacter): self
    {
        $this->playerCharacter = $playerCharacter;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection|ItemInAction[]
     */
    public function getItemInActions(): Collection
    {
        return $this->itemInActions;
    }

    public function addItemInAction(ItemInAction $itemInAction): self
    {
        if (!$this->itemInActions->contains($itemInAction)) {
            $this->itemInActions[] = $itemInAction;
            $itemInAction->setItemInBag($this);
        }

        return $this;
    }

    public function removeItemInAction(ItemInAction $itemInAction): self
    {
        if ($this->itemInActions->removeElement($itemInAction)) {
            // set the owning side to null (unless already changed)
            if ($itemInAction->getItemInBag() === $this) {
                $itemInAction->setItemInBag(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipment(): Collection
    {
        return $this->equipment;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipment->contains($equipment)) {
            $this->equipment[] = $equipment;
            $equipment->setItemInBag($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipment->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getItemInBag() === $this) {
                $equipment->setItemInBag(null);
            }
        }

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }
}
