<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\QuestInAdventureByAdventureController;
use App\Repository\QuestInAdventureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=QuestInAdventureRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'characterOfAnAdventure' => [
            'pagination_enabled'=>false,
            'path'=> '/quest_in_adventures/adventure',
            'method'=>'post',
            'controller'=>QuestInAdventureByAdventureController::class,
            'read'=>false,
            'write'=>false,
        ],
        'post'
    ]
)]
class QuestInAdventure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Quest::class, inversedBy="questInAdventures")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $quest;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:DataAdventure'])]
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:DataAdventure'])]
    private $dateTimeCreate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTimeUpdate;

    /**
     * @ORM\OneToMany(targetEntity=GoalInAdventure::class, mappedBy="questInAdventure")
     */
    #[Groups(['read:DataAdventure'])]
    private $goalInAdventures;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:DataAdventure'])]
    private $focus;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="questInAdventures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adventure;

    public function __construct()
    {
        $this->goalInAdventures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateTimeCreate(): ?\DateTimeInterface
    {
        return $this->dateTimeCreate;
    }

    public function setDateTimeCreate(\DateTimeInterface $dateTimeCreate): self
    {
        $this->dateTimeCreate = $dateTimeCreate;

        return $this;
    }

    public function getDateTimeUpdate(): ?\DateTimeInterface
    {
        return $this->dateTimeUpdate;
    }

    public function setDateTimeUpdate(\DateTimeInterface $dateTimeUpdate): self
    {
        $this->dateTimeUpdate = $dateTimeUpdate;

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
            $goalInAdventure->setQuestInAdventure($this);
        }

        return $this;
    }

    public function removeGoalInAdventure(GoalInAdventure $goalInAdventure): self
    {
        if ($this->goalInAdventures->removeElement($goalInAdventure)) {
            // set the owning side to null (unless already changed)
            if ($goalInAdventure->getQuestInAdventure() === $this) {
                $goalInAdventure->setQuestInAdventure(null);
            }
        }

        return $this;
    }

    public function getFocus(): ?bool
    {
        return $this->focus;
    }

    public function setFocus(bool $focus): self
    {
        $this->focus = $focus;

        return $this;
    }

    public function getAdventure(): ?Adventure
    {
        return $this->adventure;
    }

    public function setAdventure(?Adventure $adventure): self
    {
        $this->adventure = $adventure;

        return $this;
    }
}
