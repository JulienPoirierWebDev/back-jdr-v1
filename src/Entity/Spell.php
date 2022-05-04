<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SpellRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SpellRepository::class)
 */
#[ApiResource()]
class Spell
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
     * @ORM\ManyToOne(targetEntity=CaracteristicType::class, inversedBy="spells")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $caracteristicType;

    /**
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="spells")
     */
    private $userWhoCreate;

    /**
     * @ORM\OneToMany(targetEntity=SpellInAction::class, mappedBy="spell")
     */
    private $spellInActions;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $level;

    public function __construct()
    {
        $this->spellInActions = new ArrayCollection();
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

    /**
     * @return Collection|SpellInAction[]
     */
    public function getSpellInActions(): Collection
    {
        return $this->spellInActions;
    }

    public function addSpellInAction(SpellInAction $spellInAction): self
    {
        if (!$this->spellInActions->contains($spellInAction)) {
            $this->spellInActions[] = $spellInAction;
            $spellInAction->setSpell($this);
        }

        return $this;
    }

    public function removeSpellInAction(SpellInAction $spellInAction): self
    {
        if ($this->spellInActions->removeElement($spellInAction)) {
            // set the owning side to null (unless already changed)
            if ($spellInAction->getSpell() === $this) {
                $spellInAction->setSpell(null);
            }
        }

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
