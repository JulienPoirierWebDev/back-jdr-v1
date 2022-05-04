<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NpcRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NpcRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'get' => [
            'normalization_context' => ['groups' => ['read:Npc']]
    ]
]
)]
class Npc
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure','read:Npc'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:DataAdventure','read:MessageAdventure','read:Npc','read:CharacterOfPlayer'])]
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:DataAdventure','read:MessageAdventure','read:Npc','read:CharacterOfPlayer'])]
    private $lastName;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:Npc'])]
    private $xpReward;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:Npc'])]
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=NpcStrength::class, inversedBy="npcs")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure','read:Npc'])]
    private $npcStrength;

    /**
     * @ORM\ManyToOne(targetEntity=NpcJob::class, inversedBy="npcs")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure','read:Npc'])]
    private $npcJob;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:Npc'])]
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="npcs")
     */
    #[Groups(['read:Npc'])]
    private $userWhoCreate;

    /**
     * @ORM\OneToMany(targetEntity=NpcOnAdventure::class, mappedBy="npc")
     */
    private $npcOnAdventures;

    /**
     * @ORM\OneToMany(targetEntity=Goal::class, mappedBy="targetNpc")
     */
    #[Groups(['read:DataAdventure'])]
    private $goals;

    public function __construct()
    {
        $this->npcOnAdventures = new ArrayCollection();
        $this->goals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getXpReward(): ?int
    {
        return $this->xpReward;
    }

    public function setXpReward(int $xpReward): self
    {
        $this->xpReward = $xpReward;

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

    public function getNpcStrength(): ?NpcStrength
    {
        return $this->npcStrength;
    }

    public function setNpcStrength(?NpcStrength $npcStrength): self
    {
        $this->npcStrength = $npcStrength;

        return $this;
    }

    public function getNpcJob(): ?NpcJob
    {
        return $this->npcJob;
    }

    public function setNpcJob(?NpcJob $npcJob): self
    {
        $this->npcJob = $npcJob;

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
     * @return Collection|NpcOnAdventure[]
     */
    public function getNpcOnAdventures(): Collection
    {
        return $this->npcOnAdventures;
    }

    public function addNpcOnAdventure(NpcOnAdventure $npcOnAdventure): self
    {
        if (!$this->npcOnAdventures->contains($npcOnAdventure)) {
            $this->npcOnAdventures[] = $npcOnAdventure;
            $npcOnAdventure->setNpc($this);
        }

        return $this;
    }

    public function removeNpcOnAdventure(NpcOnAdventure $npcOnAdventure): self
    {
        if ($this->npcOnAdventures->removeElement($npcOnAdventure)) {
            // set the owning side to null (unless already changed)
            if ($npcOnAdventure->getNpc() === $this) {
                $npcOnAdventure->setNpc(null);
            }
        }

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
            $goal->setTargetNpc($this);
        }

        return $this;
    }

    public function removeGoal(Goal $goal): self
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getTargetNpc() === $this) {
                $goal->setTargetNpc(null);
            }
        }

        return $this;
    }
}
