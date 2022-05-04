<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DiceThrowRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DiceThrowRepository::class)
 */
#[ApiResource()]
class DiceThrow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Dice::class, inversedBy="diceThrows")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $dice;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="diceThrows")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $adventure;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $score;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:DataAdventure'])]
    private $throwDateTime;

    /**
     * @ORM\ManyToOne(targetEntity=CaracteristicType::class, inversedBy="diceThrows")
     */
    #[Groups(['read:DataAdventure'])]
    private $cararcteristicType;

    /**
     * @ORM\ManyToOne(targetEntity=NpcOnAdventure::class, inversedBy="diceThrows")
     */
    #[Groups(['read:DataAdventure'])]
    private $targetNpc;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="diceThrows")
     */
    #[Groups(['read:DataAdventure'])]
    private $targetPlayerCharacter;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $scoreTarget;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:DataAdventure'])]
    private $action;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:DataAdventure'])]
    private $byNpc;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="itsDiceThrows")
     */
    private $playerCharacterWhoThrow;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAttack;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $damage;


    /**
     * @ORM\Column(type="boolean")
     */
    private $gameMasterValidation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gameMasterWaiting;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTimeUpdate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    public function setDice(?Dice $dice): self
    {
        $this->dice = $dice;

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

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getThrowDateTime(): ?\DateTimeInterface
    {
        return $this->throwDateTime;
    }

    public function setThrowDateTime(\DateTimeInterface $throwDateTime): self
    {
        $this->throwDateTime = $throwDateTime;

        return $this;
    }

    public function getCararcteristicType(): ?CaracteristicType
    {
        return $this->cararcteristicType;
    }

    public function setCararcteristicType(?CaracteristicType $cararcteristicType): self
    {
        $this->cararcteristicType = $cararcteristicType;

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

    public function getTargetPlayerCharacter(): ?PlayerCharacter
    {
        return $this->targetPlayerCharacter;
    }

    public function setTargetPlayerCharacter(?PlayerCharacter $targetPlayerCharacter): self
    {
        $this->targetPlayerCharacter = $targetPlayerCharacter;

        return $this;
    }

    public function getScoreTarget(): ?int
    {
        return $this->scoreTarget;
    }

    public function setScoreTarget(int $scoreTarget): self
    {
        $this->scoreTarget = $scoreTarget;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getByNpc(): ?bool
    {
        return $this->byNpc;
    }

    public function setByNpc(bool $byNpc): self
    {
        $this->byNpc = $byNpc;

        return $this;
    }

    public function getPlayerCharacterWhoThrow(): ?PlayerCharacter
    {
        return $this->playerCharacterWhoThrow;
    }

    public function setPlayerCharacterWhoThrow(?PlayerCharacter $playerCharacterWhoThrow): self
    {
        $this->playerCharacterWhoThrow = $playerCharacterWhoThrow;

        return $this;
    }

    public function getIsAttack(): ?bool
    {
        return $this->isAttack;
    }

    public function setIsAttack(bool $isAttack): self
    {
        $this->isAttack = $isAttack;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(?int $damage): self
    {
        $this->damage = $damage;

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

    public function getGameMasterValidation(): ?bool
    {
        return $this->gameMasterValidation;
    }

    public function setGameMasterValidation(bool $gameMasterValidation): self
    {
        $this->gameMasterValidation = $gameMasterValidation;

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
}
