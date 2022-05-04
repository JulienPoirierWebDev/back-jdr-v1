<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
#[ApiResource()]
class Race
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
    #[Groups(['read:CharacterOfPlayer'])]
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $modifier;

    /**
     * @ORM\ManyToOne(targetEntity=CaracteristicType::class, inversedBy="races")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $caracteristicType;

    /**
     * @ORM\OneToMany(targetEntity=PlayerCharacter::class, mappedBy="race")
     */
    private $playerCharacters;

    public function __construct()
    {
        $this->playerCharacters = new ArrayCollection();
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

    public function getModifier(): ?int
    {
        return $this->modifier;
    }

    public function setModifier(int $modifier): self
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

    /**
     * @return Collection|PlayerCharacter[]
     */
    public function getPlayerCharacters(): Collection
    {
        return $this->playerCharacters;
    }

    public function addPlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if (!$this->playerCharacters->contains($playerCharacter)) {
            $this->playerCharacters[] = $playerCharacter;
            $playerCharacter->setRace($this);
        }

        return $this;
    }

    public function removePlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if ($this->playerCharacters->removeElement($playerCharacter)) {
            // set the owning side to null (unless already changed)
            if ($playerCharacter->getRace() === $this) {
                $playerCharacter->setRace(null);
            }
        }

        return $this;
    }
}
