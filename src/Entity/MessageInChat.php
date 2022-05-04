<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MessageInChatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MessageInChatRepository::class)
 */
#[ApiResource()]
class MessageInChat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:MessageAdventure'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="messageInChats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adventure;

    /**
     * @ORM\Column(type="string", length=500)
     */
    #[Groups(['read:MessageAdventure'])]
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:MessageAdventure'])]
    private $isPlayerMessage;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:MessageAdventure'])]
    private $dateTimeCreate;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:MessageAdventure'])]
    private $gameMasterOnly;



    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="messageInChatsReceiver")
     */
    #[Groups(['read:MessageAdventure'])]
    private $targetPlayerCharacter;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="messageInChatsTransmitter")
     */
    #[Groups(['read:MessageAdventure'])]
    private $playerCharacter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['read:MessageAdventure'])]
    private $nameOfSpeaker;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:MessageAdventure'])]
    private $isSystemMessage;


    /**
     * @ORM\ManyToOne(targetEntity=NpcOnAdventure::class, inversedBy="messageInChatsReceiver")
     */
    #[Groups(['read:MessageAdventure'])]
    private $npcReceiver;

    /**
     * @ORM\ManyToOne(targetEntity=NpcOnAdventure::class, inversedBy="messageInChatsFromNpc")
     */
    #[Groups(['read:MessageAdventure'])]
    private $npcWhoSpeak;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Groups(['read:MessageAdventure'])]
    private $playerCharacterUniqueId;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }


    public function getIsPlayerMessage(): ?bool
    {
        return $this->isPlayerMessage;
    }

    public function setIsPlayerMessage(bool $isPlayerMessage): self
    {
        $this->isPlayerMessage = $isPlayerMessage;

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

    public function getGameMasterOnly(): ?bool
    {
        return $this->gameMasterOnly;
    }

    public function setGameMasterOnly(bool $gameMasterOnly): self
    {
        $this->gameMasterOnly = $gameMasterOnly;

        return $this;
    }


    public function getTargetPlayerCharacter(): ?PlayerCharacter
    {
        return $this->targetPlayerCharacter;
    }

    public function setTargetPlayerCharacter(?PlayerCharacter $targetPlayerCharacter): self
    {
        $this->targetPlayerCharacter = $targetPlayerCharacter;

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

    public function getNameOfSpeaker(): ?string
    {
        return $this->nameOfSpeaker;
    }

    public function setNameOfSpeaker(?string $nameOfSpeaker): self
    {
        $this->nameOfSpeaker = $nameOfSpeaker;

        return $this;
    }

    public function getIsSystemMessage(): ?bool
    {
        return $this->isSystemMessage;
    }

    public function setIsSystemMessage(bool $isSystemMessage): self
    {
        $this->isSystemMessage = $isSystemMessage;

        return $this;
    }


    public function getNpcReceiver(): ?npcOnAdventure
    {
        return $this->npcReceiver;
    }

    public function setNpcReceiver(?npcOnAdventure $npcReceiver): self
    {
        $this->npcReceiver = $npcReceiver;

        return $this;
    }

    public function getNpcWhoSpeak(): ?NpcOnAdventure
    {
        return $this->npcWhoSpeak;
    }

    public function setNpcWhoSpeak(?NpcOnAdventure $npcWhoSpeak): self
    {
        $this->npcWhoSpeak = $npcWhoSpeak;

        return $this;
    }

    public function getPlayerCharacterUniqueId(): ?int
    {
        return $this->playerCharacterUniqueId;
    }

    public function setPlayerCharacterUniqueId(?int $playerCharacterUniqueId): self
    {
        $this->playerCharacterUniqueId = $playerCharacterUniqueId;

        return $this;
    }
}
