<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CaracteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CaracteristicRepository::class)
 */
#[ApiResource()]
class Caracteristic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure','read:GroupOfCharacters'])]
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure','read:GroupOfCharacters'])]
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="caracteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure'])]
    private $playerCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=CaracteristicType::class, inversedBy="caracteristics")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure','read:GroupOfCharacters'])]
    private $caracteristicType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
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

    public function getCaracteristicType(): ?CaracteristicType
    {
        return $this->caracteristicType;
    }

    public function setCaracteristicType(?CaracteristicType $caracteristicType): self
    {
        $this->caracteristicType = $caracteristicType;

        return $this;
    }
}
