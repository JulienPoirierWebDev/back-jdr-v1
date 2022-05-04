<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PowerDevelopedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PowerDevelopedRepository::class)
 */
#[ApiResource()]
class PowerDeveloped
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Power::class, inversedBy="powerDevelopeds")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $power;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="powerDevelopeds")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerCharacter;

    /**
     * @ORM\OneToMany(targetEntity=PowerInAction::class, mappedBy="powerDeveloped")
     */
    private $powerInActions;

    public function __construct()
    {
        $this->powerInActions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPower(): ?Power
    {
        return $this->power;
    }

    public function setPower(?Power $power): self
    {
        $this->power = $power;

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

    /**
     * @return Collection|PowerInAction[]
     */
    public function getPowerInActions(): Collection
    {
        return $this->powerInActions;
    }

    public function addPowerInAction(PowerInAction $powerInAction): self
    {
        if (!$this->powerInActions->contains($powerInAction)) {
            $this->powerInActions[] = $powerInAction;
            $powerInAction->setPowerDeveloped($this);
        }

        return $this;
    }

    public function removePowerInAction(PowerInAction $powerInAction): self
    {
        if ($this->powerInActions->removeElement($powerInAction)) {
            // set the owning side to null (unless already changed)
            if ($powerInAction->getPowerDeveloped() === $this) {
                $powerInAction->setPowerDeveloped(null);
            }
        }

        return $this;
    }
}
