<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NpcOnAdventureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NpcOnAdventureRepository::class)
 */
#[ApiResource()]
class NpcOnAdventure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure','read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:DataAdventure'])]
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="npcOnAdventures")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $adventure;

    /**
     * @ORM\ManyToOne(targetEntity=Npc::class, inversedBy="npcOnAdventures")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure', 'read:MessageAdventure','read:CharacterOfPlayer'])]
    private $npc;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:DataAdventure'])]
    private $presentOnScene;

    /**
     * @ORM\OneToMany(targetEntity=SkillInAction::class, mappedBy="targetNpc")
     */
    private $skillInActions;

    /**
     * @ORM\OneToMany(targetEntity=SpellInAction::class, mappedBy="targetNpc")
     */
    private $spellInActions;

    /**
     * @ORM\OneToMany(targetEntity=PowerInAction::class, mappedBy="targetNpc")
     */
    private $powerInActions;

    /**
     * @ORM\OneToMany(targetEntity=DiceThrow::class, mappedBy="targetNpc")
     */
    private $diceThrows;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure', 'read:CharacterOfPlayer'])]
    private $health;







    /**
     * @ORM\OneToMany(targetEntity=MessageInChat::class, mappedBy="npcReceiver")
     */
    private $messageInChatsReceiver;

    /**
     * @ORM\OneToMany(targetEntity=MessageInChat::class, mappedBy="npcWhoSpeak")
     */
    private $messageInChatsFromNpc;

    /**
     * @ORM\OneToMany(targetEntity=ItemInAction::class, mappedBy="targetNpc")
     */
    private $itemInActionTarget;

    public function __construct()
    {
        $this->skillInActions = new ArrayCollection();
        $this->spellInActions = new ArrayCollection();
        $this->powerInActions = new ArrayCollection();
        $this->diceThrows = new ArrayCollection();
        $this->messageInChatsTransmitter = new ArrayCollection();
        $this->messageInChatsReceiver = new ArrayCollection();
        $this->messageInChatsFromNpc = new ArrayCollection();
        $this->itemInActionTarget = new ArrayCollection();
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

    public function getAdventure(): ?Adventure
    {
        return $this->adventure;
    }

    public function setAdventure(?Adventure $adventure): self
    {
        $this->adventure = $adventure;

        return $this;
    }

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(?Npc $npc): self
    {
        $this->npc = $npc;

        return $this;
    }

    public function getPresentOnScene(): ?bool
    {
        return $this->presentOnScene;
    }

    public function setPresentOnScene(bool $presentOnScene): self
    {
        $this->presentOnScene = $presentOnScene;

        return $this;
    }

    /**
     * @return Collection|SkillInAction[]
     */
    public function getSkillInActions(): Collection
    {
        return $this->skillInActions;
    }

    public function addSkillInAction(SkillInAction $skillInAction): self
    {
        if (!$this->skillInActions->contains($skillInAction)) {
            $this->skillInActions[] = $skillInAction;
            $skillInAction->setTargetNpc($this);
        }

        return $this;
    }

    public function removeSkillInAction(SkillInAction $skillInAction): self
    {
        if ($this->skillInActions->removeElement($skillInAction)) {
            // set the owning side to null (unless already changed)
            if ($skillInAction->getTargetNpc() === $this) {
                $skillInAction->setTargetNpc(null);
            }
        }

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
            $spellInAction->setTargetNpc($this);
        }

        return $this;
    }

    public function removeSpellInAction(SpellInAction $spellInAction): self
    {
        if ($this->spellInActions->removeElement($spellInAction)) {
            // set the owning side to null (unless already changed)
            if ($spellInAction->getTargetNpc() === $this) {
                $spellInAction->setTargetNpc(null);
            }
        }

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
            $powerInAction->setTargetNpc($this);
        }

        return $this;
    }

    public function removePowerInAction(PowerInAction $powerInAction): self
    {
        if ($this->powerInActions->removeElement($powerInAction)) {
            // set the owning side to null (unless already changed)
            if ($powerInAction->getTargetNpc() === $this) {
                $powerInAction->setTargetNpc(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DiceThrow[]
     */
    public function getDiceThrows(): Collection
    {
        return $this->diceThrows;
    }

    public function addDiceThrow(DiceThrow $diceThrow): self
    {
        if (!$this->diceThrows->contains($diceThrow)) {
            $this->diceThrows[] = $diceThrow;
            $diceThrow->setTargetNpc($this);
        }

        return $this;
    }

    public function removeDiceThrow(DiceThrow $diceThrow): self
    {
        if ($this->diceThrows->removeElement($diceThrow)) {
            // set the owning side to null (unless already changed)
            if ($diceThrow->getTargetNpc() === $this) {
                $diceThrow->setTargetNpc(null);
            }
        }

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return Collection|MessageInChat[]
     */
    public function getMessageInChatsReceiver(): Collection
    {
        return $this->messageInChatsReceiver;
    }

    public function addMessageInChatsReceiver(MessageInChat $messageInChatsReceiver): self
    {
        if (!$this->messageInChatsReceiver->contains($messageInChatsReceiver)) {
            $this->messageInChatsReceiver[] = $messageInChatsReceiver;
            $messageInChatsReceiver->setNpcReceiver($this);
        }

        return $this;
    }

    public function removeMessageInChatsReceiver(MessageInChat $messageInChatsReceiver): self
    {
        if ($this->messageInChatsReceiver->removeElement($messageInChatsReceiver)) {
            // set the owning side to null (unless already changed)
            if ($messageInChatsReceiver->getNpcReceiver() === $this) {
                $messageInChatsReceiver->setNpcReceiver(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MessageInChat[]
     */
    public function getMessageInChatsFromNpc(): Collection
    {
        return $this->messageInChatsFromNpc;
    }

    public function addMessageInChatsFromNpc(MessageInChat $messageInChatsFromNpc): self
    {
        if (!$this->messageInChatsFromNpc->contains($messageInChatsFromNpc)) {
            $this->messageInChatsFromNpc[] = $messageInChatsFromNpc;
            $messageInChatsFromNpc->setNpcWhoSpeak($this);
        }

        return $this;
    }

    public function removeMessageInChatsFromNpc(MessageInChat $messageInChatsFromNpc): self
    {
        if ($this->messageInChatsFromNpc->removeElement($messageInChatsFromNpc)) {
            // set the owning side to null (unless already changed)
            if ($messageInChatsFromNpc->getNpcWhoSpeak() === $this) {
                $messageInChatsFromNpc->setNpcWhoSpeak(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ItemInAction[]
     */
    public function getItemInActionTarget(): Collection
    {
        return $this->itemInActionTarget;
    }

    public function addItemInActionTarget(ItemInAction $itemInActionTarget): self
    {
        if (!$this->itemInActionTarget->contains($itemInActionTarget)) {
            $this->itemInActionTarget[] = $itemInActionTarget;
            $itemInActionTarget->setTargetNpc($this);
        }

        return $this;
    }

    public function removeItemInActionTarget(ItemInAction $itemInActionTarget): self
    {
        if ($this->itemInActionTarget->removeElement($itemInActionTarget)) {
            // set the owning side to null (unless already changed)
            if ($itemInActionTarget->getTargetNpc() === $this) {
                $itemInActionTarget->setTargetNpc(null);
            }
        }

        return $this;
    }
}
