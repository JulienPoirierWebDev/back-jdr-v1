<?php

namespace App\Entity;

use ApiPlatform\Core\Action\NotFoundAction;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\CharacterOfPlayerController;
use App\Controller\CheckAdventureController;
use App\Controller\CheckPlayerCharactersController;
use App\Controller\ConnexionAdventureController;
use App\Controller\CountAdventureController;
use App\Controller\PlayerCharactersAdventureController;
use App\Controller\UserAdventureController;
use App\Repository\PlayerCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PlayerCharacterRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'checkCharacter' => [
            'pagination_enabled'=>false,
            'path'=> '/player_characters/check',
            'method'=>'post',
            'controller'=>CheckPlayerCharactersController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:CharacterOfPlayer']]
        ],
        'characterOfAnAdventure' => [
            'pagination_enabled'=>false,
            'path'=> '/player_characters/adventure',
            'method'=>'post',
            'controller'=>PlayerCharactersAdventureController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:GroupOfCharacters']]
        ],
        'gmcharacterOfAnAdventure' => [
            'pagination_enabled'=>false,
            'path'=> '/player_characters/gm',
            'method'=>'post',
            'controller'=>PlayerCharactersAdventureController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:CharacterOfPlayer']]
        ],
        'get'=> [
            'controller' => NotFoundAction::class,
            'openapi_context' => [
                'summary' => 'hidden',
            ],
            'read' => false,
            'output' => false

        ],
    ],

    itemOperations: [
        'get'
    ],

)]class PlayerCharacter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer', 'read:DataAdventure', 'read:GroupOfCharacters','read:MessageAdventure'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="playerCharacters")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $adventure;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="playerCharacters")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure'])]
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Caracteristic::class, mappedBy="playerCharacter", orphanRemoval=true)
     */
    #[Groups(['read:CharacterOfPlayer', 'read:DataAdventure','read:GroupOfCharacters'])]
    private $caracteristics;

    /**
     * @ORM\OneToMany(targetEntity=SkillInAction::class, mappedBy="targetPlayerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $skillInActions;

    /**
     * @ORM\OneToMany(targetEntity=SpellInAction::class, mappedBy="targetPlayerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $spellInActions;

    /**
     * @ORM\OneToMany(targetEntity=PowerDeveloped::class, mappedBy="playerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $powerDevelopeds;

    /**
     * @ORM\OneToMany(targetEntity=PowerInAction::class, mappedBy="targetPlayerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $powerInActions;

    /**
     * @ORM\ManyToOne(targetEntity=AvatarIcon::class, inversedBy="playerCharacters")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure','read:GroupOfCharacters', 'read:CharacterOfPlayer','read:MessageAdventure'])]
    private $avatarIcon;

    /**
     * @ORM\OneToMany(targetEntity=ItemInBag::class, mappedBy="playerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $itemInBags;

    /**
     * @ORM\OneToMany(targetEntity=ItemInAction::class, mappedBy="targetPlayerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $itemInActions;

    /**
     * @ORM\OneToMany(targetEntity=DiceThrow::class, mappedBy="targetPlayerCharacter")
     */
    private $diceThrows;

    /**
     * @ORM\OneToMany(targetEntity=Equipment::class, mappedBy="playerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $equipment;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="playerCharacters")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $race;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:CharacterOfPlayer','read:DataAdventure', 'read:GroupOfCharacters','read:MessageAdventure'])]
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SkillDeveloped::class, mappedBy="playerCharacter")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $skillDevelopeds;

    /**
     * @ORM\OneToMany(targetEntity=MessageInChat::class, mappedBy="targetPlayerCharacter")
     */
    private $messageInChatsReceiver;

    /**
     * @ORM\OneToMany(targetEntity=MessageInChat::class, mappedBy="playerCharacter")
     */
    private $messageInChatsTransmitter;

    /**
     * @ORM\OneToMany(targetEntity=DiceThrow::class, mappedBy="playerCharacterWhoThrow")
     */
    private $itsDiceThrows;

    /**
     * @ORM\OneToMany(targetEntity=SpellInAction::class, mappedBy="playerWhoLaunch")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $spellsInActionsLaunched;

    /**
     * @ORM\OneToMany(targetEntity=PowerInAction::class, mappedBy="playerWhoLaunch")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerWhoLaunchPower;

    /**
     * @ORM\OneToMany(targetEntity=SkillInAction::class, mappedBy="playerWhoLaunch")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerWhoLaunchSkill;

    /**
     * @ORM\OneToMany(targetEntity=ItemInAction::class, mappedBy="playerWhoLaunch")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerWhoLaunchItem;



    public function __construct()
    {
        $this->caracteristics = new ArrayCollection();
        $this->skillInActions = new ArrayCollection();
        $this->spellInActions = new ArrayCollection();
        $this->powerDevelopeds = new ArrayCollection();
        $this->powerInActions = new ArrayCollection();
        $this->itemInBags = new ArrayCollection();
        $this->itemInActions = new ArrayCollection();
        $this->diceThrows = new ArrayCollection();
        $this->equipment = new ArrayCollection();
        $this->skillDevelopeds = new ArrayCollection();
        $this->messageInChatsReceiver = new ArrayCollection();
        $this->messageInChatsTransmitter = new ArrayCollection();
        $this->itsDiceThrows = new ArrayCollection();
        $this->spellsInActionsLaunched = new ArrayCollection();
        $this->playerWhoLaunchPower = new ArrayCollection();
        $this->playerWhoLaunchSkill = new ArrayCollection();
        $this->playerWhoLaunchItem = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Caracteristic[]
     */
    public function getCaracteristics(): Collection
    {
        return $this->caracteristics;
    }

    public function addCaracteristic(Caracteristic $caracteristic): self
    {
        if (!$this->caracteristics->contains($caracteristic)) {
            $this->caracteristics[] = $caracteristic;
            $caracteristic->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removeCaracteristic(Caracteristic $caracteristic): self
    {
        if ($this->caracteristics->removeElement($caracteristic)) {
            // set the owning side to null (unless already changed)
            if ($caracteristic->getPlayerCharacter() === $this) {
                $caracteristic->setPlayerCharacter(null);
            }
        }

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
            $skillInAction->setTargetPlayerCharacter($this);
        }

        return $this;
    }

    public function removeSkillInAction(SkillInAction $skillInAction): self
    {
        if ($this->skillInActions->removeElement($skillInAction)) {
            // set the owning side to null (unless already changed)
            if ($skillInAction->getTargetPlayerCharacter() === $this) {
                $skillInAction->setTargetPlayerCharacter(null);
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
            $spellInAction->setTargetPlayerCharacter($this);
        }

        return $this;
    }

    public function removeSpellInAction(SpellInAction $spellInAction): self
    {
        if ($this->spellInActions->removeElement($spellInAction)) {
            // set the owning side to null (unless already changed)
            if ($spellInAction->getTargetPlayerCharacter() === $this) {
                $spellInAction->setTargetPlayerCharacter(null);
            }
        }

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
            $powerDeveloped->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removePowerDeveloped(PowerDeveloped $powerDeveloped): self
    {
        if ($this->powerDevelopeds->removeElement($powerDeveloped)) {
            // set the owning side to null (unless already changed)
            if ($powerDeveloped->getPlayerCharacter() === $this) {
                $powerDeveloped->setPlayerCharacter(null);
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
            $powerInAction->setTargetPlayerCharacter($this);
        }

        return $this;
    }

    public function removePowerInAction(PowerInAction $powerInAction): self
    {
        if ($this->powerInActions->removeElement($powerInAction)) {
            // set the owning side to null (unless already changed)
            if ($powerInAction->getTargetPlayerCharacter() === $this) {
                $powerInAction->setTargetPlayerCharacter(null);
            }
        }

        return $this;
    }

    public function getAvatarIcon(): ?AvatarIcon
    {
        return $this->avatarIcon;
    }

    public function setAvatarIcon(?AvatarIcon $avatarIcon): self
    {
        $this->avatarIcon = $avatarIcon;

        return $this;
    }

    /**
     * @return Collection|ItemInBag[]
     */
    public function getItemInBags(): Collection
    {
        return $this->itemInBags;
    }

    public function addItemInBag(ItemInBag $itemInBag): self
    {
        if (!$this->itemInBags->contains($itemInBag)) {
            $this->itemInBags[] = $itemInBag;
            $itemInBag->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removeItemInBag(ItemInBag $itemInBag): self
    {
        if ($this->itemInBags->removeElement($itemInBag)) {
            // set the owning side to null (unless already changed)
            if ($itemInBag->getPlayerCharacter() === $this) {
                $itemInBag->setPlayerCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ItemInAction[]
     */
    public function getItemInActions(): Collection
    {
        return $this->itemInActions;
    }

    public function addItemInAction(ItemInAction $itemInAction): self
    {
        if (!$this->itemInActions->contains($itemInAction)) {
            $this->itemInActions[] = $itemInAction;
            $itemInAction->setTargetPlayerCharacter($this);
        }

        return $this;
    }

    public function removeItemInAction(ItemInAction $itemInAction): self
    {
        if ($this->itemInActions->removeElement($itemInAction)) {
            // set the owning side to null (unless already changed)
            if ($itemInAction->getTargetPlayerCharacter() === $this) {
                $itemInAction->setTargetPlayerCharacter(null);
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
            $diceThrow->setTargetPlayerCharacter($this);
        }

        return $this;
    }

    public function removeDiceThrow(DiceThrow $diceThrow): self
    {
        if ($this->diceThrows->removeElement($diceThrow)) {
            // set the owning side to null (unless already changed)
            if ($diceThrow->getTargetPlayerCharacter() === $this) {
                $diceThrow->setTargetPlayerCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipment(): Collection
    {
        return $this->equipment;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipment->contains($equipment)) {
            $this->equipment[] = $equipment;
            $equipment->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipment->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getPlayerCharacter() === $this) {
                $equipment->setPlayerCharacter(null);
            }
        }

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

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

    /**
     * @return Collection|SkillDeveloped[]
     */
    public function getSkillDevelopeds(): Collection
    {
        return $this->skillDevelopeds;
    }

    public function addSkillDeveloped(SkillDeveloped $skillDeveloped): self
    {
        if (!$this->skillDevelopeds->contains($skillDeveloped)) {
            $this->skillDevelopeds[] = $skillDeveloped;
            $skillDeveloped->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removeSkillDeveloped(SkillDeveloped $skillDeveloped): self
    {
        if ($this->skillDevelopeds->removeElement($skillDeveloped)) {
            // set the owning side to null (unless already changed)
            if ($skillDeveloped->getPlayerCharacter() === $this) {
                $skillDeveloped->setPlayerCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MessageInChat[]
     */
    public function getMessageInChatsReceiver(): Collection
    {
        return $this->messageInChatsReceiver;
    }

    public function addMessageInChatReceiver(MessageInChat $messageInChatReceiver): self
    {
        if (!$this->messageInChatsReceiver->contains($messageInChatReceiver)) {
            $this->messageInChatsReceiver[] = $messageInChatReceiver;
            $messageInChatReceiver->setTargetPlayerCharacter($this);
        }

        return $this;
    }

    public function removeMessageInChatReceiver(MessageInChat $messageInChatReceiver): self
    {
        if ($this->messageInChatsReceiver->removeElement($messageInChatReceiver)) {
            // set the owning side to null (unless already changed)
            if ($messageInChatReceiver->getTargetPlayerCharacter() === $this) {
                $messageInChatReceiver->setTargetPlayerCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MessageInChat[]
     */
    public function getMessageInChatsTransmitter(): Collection
    {
        return $this->messageInChatsTransmitter;
    }

    public function addMessageInChatsTransmitter(MessageInChat $messageInChatsTransmitter): self
    {
        if (!$this->messageInChatsTransmitter->contains($messageInChatsTransmitter)) {
            $this->messageInChatsTransmitter[] = $messageInChatsTransmitter;
            $messageInChatsTransmitter->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removeMessageInChatsTransmitter(MessageInChat $messageInChatsTransmitter): self
    {
        if ($this->messageInChatsTransmitter->removeElement($messageInChatsTransmitter)) {
            // set the owning side to null (unless already changed)
            if ($messageInChatsTransmitter->getPlayerCharacter() === $this) {
                $messageInChatsTransmitter->setPlayerCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DiceThrow[]
     */
    public function getItsDiceThrows(): Collection
    {
        return $this->itsDiceThrows;
    }

    public function addItsDiceThrow(DiceThrow $itsDiceThrow): self
    {
        if (!$this->itsDiceThrows->contains($itsDiceThrow)) {
            $this->itsDiceThrows[] = $itsDiceThrow;
            $itsDiceThrow->setPlayerCharacterWhoThrow($this);
        }

        return $this;
    }

    public function removeItsDiceThrow(DiceThrow $itsDiceThrow): self
    {
        if ($this->itsDiceThrows->removeElement($itsDiceThrow)) {
            // set the owning side to null (unless already changed)
            if ($itsDiceThrow->getPlayerCharacterWhoThrow() === $this) {
                $itsDiceThrow->setPlayerCharacterWhoThrow(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SpellInAction[]
     */
    public function getSpellsInActionsLaunched(): Collection
    {
        return $this->spellsInActionsLaunched;
    }

    public function addSpellsInActionsLaunched(SpellInAction $spellsInActionsLaunched): self
    {
        if (!$this->spellsInActionsLaunched->contains($spellsInActionsLaunched)) {
            $this->spellsInActionsLaunched[] = $spellsInActionsLaunched;
            $spellsInActionsLaunched->setPlayerWhoLaunch($this);
        }

        return $this;
    }

    public function removeSpellsInActionsLaunched(SpellInAction $spellsInActionsLaunched): self
    {
        if ($this->spellsInActionsLaunched->removeElement($spellsInActionsLaunched)) {
            // set the owning side to null (unless already changed)
            if ($spellsInActionsLaunched->getPlayerWhoLaunch() === $this) {
                $spellsInActionsLaunched->setPlayerWhoLaunch(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PowerInAction[]
     */
    public function getPlayerWhoLaunchPower(): Collection
    {
        return $this->playerWhoLaunchPower;
    }

    public function addPlayerWhoLaunchPower(PowerInAction $playerWhoLaunchPower): self
    {
        if (!$this->playerWhoLaunchPower->contains($playerWhoLaunchPower)) {
            $this->playerWhoLaunchPower[] = $playerWhoLaunchPower;
            $playerWhoLaunchPower->setPlayerWhoLaunch($this);
        }

        return $this;
    }

    public function removePlayerWhoLaunchPower(PowerInAction $playerWhoLaunchPower): self
    {
        if ($this->playerWhoLaunchPower->removeElement($playerWhoLaunchPower)) {
            // set the owning side to null (unless already changed)
            if ($playerWhoLaunchPower->getPlayerWhoLaunch() === $this) {
                $playerWhoLaunchPower->setPlayerWhoLaunch(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SkillInAction[]
     */
    public function getPlayerWhoLaunchSkill(): Collection
    {
        return $this->playerWhoLaunchSkill;
    }

    public function addPlayerWhoLaunchSkill(SkillInAction $playerWhoLaunchSkill): self
    {
        if (!$this->playerWhoLaunchSkill->contains($playerWhoLaunchSkill)) {
            $this->playerWhoLaunchSkill[] = $playerWhoLaunchSkill;
            $playerWhoLaunchSkill->setPlayerWhoLaunch($this);
        }

        return $this;
    }

    public function removePlayerWhoLaunchSkill(SkillInAction $playerWhoLaunchSkill): self
    {
        if ($this->playerWhoLaunchSkill->removeElement($playerWhoLaunchSkill)) {
            // set the owning side to null (unless already changed)
            if ($playerWhoLaunchSkill->getPlayerWhoLaunch() === $this) {
                $playerWhoLaunchSkill->setPlayerWhoLaunch(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ItemInAction[]
     */
    public function getPlayerWhoLaunchItem(): Collection
    {
        return $this->playerWhoLaunchItem;
    }

    public function addPlayerWhoLaunchItem(ItemInAction $playerWhoLaunchItem): self
    {
        if (!$this->playerWhoLaunchItem->contains($playerWhoLaunchItem)) {
            $this->playerWhoLaunchItem[] = $playerWhoLaunchItem;
            $playerWhoLaunchItem->setPlayerWhoLaunch($this);
        }

        return $this;
    }

    public function removePlayerWhoLaunchItem(ItemInAction $playerWhoLaunchItem): self
    {
        if ($this->playerWhoLaunchItem->removeElement($playerWhoLaunchItem)) {
            // set the owning side to null (unless already changed)
            if ($playerWhoLaunchItem->getPlayerWhoLaunch() === $this) {
                $playerWhoLaunchItem->setPlayerWhoLaunch(null);
            }
        }

        return $this;
    }


}
