<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ItemInActionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ItemInActionRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'get' => [
            'normalization_context' => ['groups' => ['read:CharacterOfPlayer']]
        ]
    ],
    itemOperations: [
        'get',
        'delete',
        'put',
        'patch'
    ],
)]
class ItemInAction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ItemInBag::class, inversedBy="itemInActions")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $itemInBag;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="itemInActions")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $targetPlayerCharacter;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $dateTimeCreate;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $dateTimeUpdate;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $gameMasterWaiting;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $gameMasterValidation;

    /**
     * @ORM\ManyToOne(targetEntity=NpcOnAdventure::class, inversedBy="itemInActionTarget")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $targetNpc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $targetPlayerCharacterUniqueId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $targetPlayerCharacterName;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="playerWhoLaunchItem")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerWhoLaunch;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemInBag(): ?ItemInBag
    {
        return $this->itemInBag;
    }

    public function setItemInBag(?ItemInBag $itemInBag): self
    {
        $this->itemInBag = $itemInBag;

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

    public function getGameMasterWaiting(): ?bool
    {
        return $this->gameMasterWaiting;
    }

    public function setGameMasterWaiting(bool $gameMasterWaiting): self
    {
        $this->gameMasterWaiting = $gameMasterWaiting;

        return $this;
    }

    public function getGameMasterValidation(): ?bool
    {
        return $this->gameMasterValidation;
    }

    public function setGameMasterValidation(bool $gameMasterValidation): self
    {
        $this->gameMasterValidation = $gameMasterValidation;

        return $this;
    }

    public function getTargetNpc(): ?NpcOnAdventure
    {
        return $this->targetNpc;
    }

    public function setTargetNpc(?NpcOnAdventure $targetNpc): self
    {
        $this->targetNpc = $targetNpc;

        return $this;
    }

    public function getTargetPlayerCharacterUniqueId(): ?int
    {
        return $this->targetPlayerCharacterUniqueId;
    }

    public function setTargetPlayerCharacterUniqueId(?int $targetPlayerCharacterUniqueId): self
    {
        $this->targetPlayerCharacterUniqueId = $targetPlayerCharacterUniqueId;

        return $this;
    }

    public function getTargetPlayerCharacterName(): ?string
    {
        return $this->targetPlayerCharacterName;
    }

    public function setTargetPlayerCharacterName(?string $targetPlayerCharacterName): self
    {
        $this->targetPlayerCharacterName = $targetPlayerCharacterName;

        return $this;
    }

    public function getPlayerWhoLaunch(): ?PlayerCharacter
    {
        return $this->playerWhoLaunch;
    }

    public function setPlayerWhoLaunch(?PlayerCharacter $playerWhoLaunch): self
    {
        $this->playerWhoLaunch = $playerWhoLaunch;

        return $this;
    }
}
