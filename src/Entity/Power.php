<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PowerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PowerRepository::class)
 */
#[ApiResource()]
class Power
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
     * @ORM\Column(type="string", length=1000)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $modifier;

    /**
     * @ORM\ManyToOne(targetEntity=CaracteristicType::class, inversedBy="powers")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $carecteristicType;

    /**
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="powers")
     */
    private $userWhoCreate;

    /**
     * @ORM\OneToMany(targetEntity=PowerDeveloped::class, mappedBy="power")
     */
    private $powerDevelopeds;

    public function __construct()
    {
        $this->powerDevelopeds = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getCarecteristicType(): ?CaracteristicType
    {
        return $this->carecteristicType;
    }

    public function setCarecteristicType(?CaracteristicType $carecteristicType): self
    {
        $this->carecteristicType = $carecteristicType;

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

    /**
     * @return Collection|PowerDeveloped[]
     */
    public function getPowerDevelopeds(): Collection
    {
        return $this->powerDevelopeds;
    }

    public function addPowerDeveloped(PowerDeveloped $powerDeveloped): self
    {
        if (!$this->powerDevelopeds->contains($powerDeveloped)) {
            $this->powerDevelopeds[] = $powerDeveloped;
            $powerDeveloped->setPower($this);
        }

        return $this;
    }

    public function removePowerDeveloped(PowerDeveloped $powerDeveloped): self
    {
        if ($this->powerDevelopeds->removeElement($powerDeveloped)) {
            // set the owning side to null (unless already changed)
            if ($powerDeveloped->getPower() === $this) {
                $powerDeveloped->setPower(null);
            }
        }

        return $this;
    }
}
