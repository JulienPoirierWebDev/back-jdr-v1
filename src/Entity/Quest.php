<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=QuestRepository::class)
 */
#[ApiResource()]
class Quest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;


    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="quests")
     */
    private $useWhoCreate;

    /**
     * @ORM\OneToMany(targetEntity=Goal::class, mappedBy="quest")
     */
    private $goals;

    /**
     * @ORM\OneToMany(targetEntity=QuestInAdventure::class, mappedBy="quest")
     */
    private $questInAdventures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:DataAdventure'])]
    private $name;

    public function __construct()
    {
        $this->goals = new ArrayCollection();
        $this->questInAdventures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUserCreation(): ?bool
    {
        return $this->userCreation;
    }

    public function setUserCreation(bool $userCreation): self
    {
        $this->userCreation = $userCreation;

        return $this;
    }

    public function getUseWhoCreate(): ?User
    {
        return $this->useWhoCreate;
    }

    public function setUseWhoCreate(?User $useWhoCreate): self
    {
        $this->useWhoCreate = $useWhoCreate;

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
            $goal->setQuest($this);
        }

        return $this;
    }

    public function removeGoal(Goal $goal): self
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getQuest() === $this) {
                $goal->setQuest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|QuestInAdventure[]
     */
    public function getQuestInAdventures(): Collection
    {
        return $this->questInAdventures;
    }

    public function addQuestInAdventure(QuestInAdventure $questInAdventure): self
    {
        if (!$this->questInAdventures->contains($questInAdventure)) {
            $this->questInAdventures[] = $questInAdventure;
            $questInAdventure->setQuest($this);
        }

        return $this;
    }

    public function removeQuestInAdventure(QuestInAdventure $questInAdventure): self
    {
        if ($this->questInAdventures->removeElement($questInAdventure)) {
            // set the owning side to null (unless already changed)
            if ($questInAdventure->getQuest() === $this) {
                $questInAdventure->setQuest(null);
            }
        }

        return $this;
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
}
