<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GoalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GoalRepository::class)
 */
#[ApiResource()]
class Goal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=GoalType::class, inversedBy="goals")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $goalType;

    /**
     * @ORM\ManyToOne(targetEntity=Quest::class, inversedBy="goals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $quest;

    /**
     * @ORM\ManyToOne(targetEntity=Npc::class, inversedBy="goals")
     */
    #[Groups(['read:DataAdventure'])]
    private $targetNpc;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="goals")
     */
    #[Groups(['read:DataAdventure'])]
    private $targetPlace;

    /**
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="goals")
     */
    private $userWhoCreate;

    /**
     * @ORM\OneToMany(targetEntity=GoalInAdventure::class, mappedBy="goal")
     */
    #[Groups(['read:DataAdventure'])]
    private $goalInAdventures;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="goals")
     */
    #[Groups(['read:DataAdventure'])]
    private $targetItem;

    public function __construct()
    {
        $this->goalInAdventures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoalType(): ?GoalType
    {
        return $this->goalType;
    }

    public function setGoalType(?GoalType $goalType): self
    {
        $this->goalType = $goalType;

        return $this;
    }

    public function getQuest(): ?Quest
    {
        return $this->quest;
    }

    public function setQuest(?Quest $quest): self
    {
        $this->quest = $quest;

        return $this;
    }

    public function getTargetNpc(): ?Npc
    {
        return $this->targetNpc;
    }

    public function setTargetNpc(?Npc $targetNpc): self
    {
        $this->targetNpc = $targetNpc;

        return $this;
    }

    public function getTargetPlace(): ?Place
    {
        return $this->targetPlace;
    }

    public function setTargetPlace(?Place $targetPlace): self
    {
        $this->targetPlace = $targetPlace;

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
     * @return Collection|GoalInAdventure[]
     */
    public function getGoalInAdventures(): Collection
    {
        return $this->goalInAdventures;
    }

    public function addGoalInAdventure(GoalInAdventure $goalInAdventure): self
    {
        if (!$this->goalInAdventures->contains($goalInAdventure)) {
            $this->goalInAdventures[] = $goalInAdventure;
            $goalInAdventure->setGoal($this);
        }

        return $this;
    }

    public function removeGoalInAdventure(GoalInAdventure $goalInAdventure): self
    {
        if ($this->goalInAdventures->removeElement($goalInAdventure)) {
            // set the owning side to null (unless already changed)
            if ($goalInAdventure->getGoal() === $this) {
                $goalInAdventure->setGoal(null);
            }
        }

        return $this;
    }

    public function getTargetItem(): ?item
    {
        return $this->targetItem;
    }

    public function setTargetItem(?item $targetItem): self
    {
        $this->targetItem = $targetItem;

        return $this;
    }
}
