<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GoalInAdventureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GoalInAdventureRepository::class)
 */
#[ApiResource()]
class GoalInAdventure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Goal::class, inversedBy="goalInAdventures")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $goal;

    /**
     * @ORM\ManyToOne(targetEntity=QuestInAdventure::class, inversedBy="goalInAdventures")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $questInAdventure;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    #[Groups(['read:DataAdventure'])]
    private $dateTimeFinish;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoal(): ?Goal
    {
        return $this->goal;
    }

    public function setGoal(?Goal $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getQuestInAdventure(): ?QuestInAdventure
    {
        return $this->questInAdventure;
    }

    public function setQuestInAdventure(?QuestInAdventure $questInAdventure): self
    {
        $this->questInAdventure = $questInAdventure;

        return $this;
    }

    public function getDateTimeFinish(): ?\DateTimeInterface
    {
        return $this->dateTimeFinish;
    }

    public function setDateTimeFinish(?\DateTimeInterface $dateTimeFinish): self
    {
        $this->dateTimeFinish = $dateTimeFinish;

        return $this;
    }
}
