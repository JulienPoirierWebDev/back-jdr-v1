<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EquipmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
#[ApiResource(
    itemOperations: [
        'get',
        "delete"
    ],
    collectionOperations: [
        'get',
        "post"]
)]
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="equipment")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=ItemInBag::class, inversedBy="equipment")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $itemInBag;

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

    public function getItemInBag(): ?ItemInBag
    {
        return $this->itemInBag;
    }

    public function setItemInBag(?ItemInBag $itemInBag): self
    {
        $this->itemInBag = $itemInBag;

        return $this;
    }
}
