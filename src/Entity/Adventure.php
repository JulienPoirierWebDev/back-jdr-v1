<?php

namespace App\Entity;

use ApiPlatform\Core\Action\NotFoundAction;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\CharacterOfPlayerController;
use App\Controller\CheckAdventureController;
use App\Controller\ConnexionAdventureController;
use App\Controller\CountAdventureController;
use App\Controller\DataAdventureController;
use App\Controller\IdAdventureController;
use App\Controller\UserAdventureController;
use App\Repository\AdventureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AdventureRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'check' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/check',
            'method'=>'post',
            'controller'=>CheckAdventureController::class,
            'read'=>false,
            'write'=>false,
        ],
        'getId' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/id',
            'method'=>'post',
            'controller'=>IdAdventureController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:AdventureId']]

        ],
        'getDataAdventure' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/data',
            'method'=>'post',
            'controller'=>DataAdventureController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:DataAdventure']]
        ],  
        'getMessagesInAdventure' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/message',
            'method'=>'post',
            'controller'=>DataAdventureController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:MessageAdventure']]
        ],
        'getActions' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/actions',
            'method'=>'post',
            'controller'=>DataAdventureController::class,
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
        'count' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/count',
            'method'=>'post',
            'controller'=>CountAdventureController::class,
            'read'=>false,
            'write'=>false,
        ],
        'byUser' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/user',
            'method'=>'get',
            'controller'=>UserAdventureController::class,
            'read'=>false,
            'write'=>false,
            'normalization_context' => ['groups' => ['read:AdventureFetch']]
        ],
        'connexion' => [
            'pagination_enabled'=>false,
            'path'=> '/adventures/connexion',
            'method'=>'post',
            'controller'=>ConnexionAdventureController::class,
            'read'=>false,
            'write'=>false,
        ],
    ],

        itemOperations: [
        'get'
    ],
)]
class Adventure
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:AdventureFetch', 'read:AdventureId', 'read:CharacterOfPlayer','read:DataAdventure','read:MessageAdventure','read:UpdateItem'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="adventures")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:AdventureFetch','read:AdventureId','read:DataAdventure'])]
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:DataAdventure','read:MessageAdventure'])]
    private $gameMasterNickName;

    /**
     * @ORM\OneToMany(targetEntity=PlayerCharacter::class, mappedBy="adventure")
     */
    #[Groups(['read:DataAdventure','read:MessageAdventure,read:CharacterOfPlayer'])]
    private $playerCharacters;

    /**
     * @ORM\OneToMany(targetEntity=NpcOnAdventure::class, mappedBy="adventure", orphanRemoval=true)
     */
    #[Groups(['read:DataAdventure'])]
    private $npcOnAdventures;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="adventure")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity=DiceThrow::class, mappedBy="adventure")
     */
    #[Groups(['read:DataAdventure'])]
    private $diceThrows;

    /**
     * @ORM\OneToMany(targetEntity=MessageInChat::class, mappedBy="adventure")
     */
    #[Groups(['read:MessageAdventure'])]
    private $messageInChats;

    /**
     * @ORM\OneToMany(targetEntity=LastUpdateItem::class, mappedBy="adventure")
     */
    private $lastUpdateItems;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:AdventureFetch', 'read:DataAdventure'])]
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:AdventureFetch'])]
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:AdventureFetch'])]
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=VisitedPlace::class, mappedBy="adventure")
     */
    #[Groups(['read:DataAdventure'])]
    private $visitedPlaces;

    /**
     * @ORM\OneToMany(targetEntity=QuestInAdventure::class, mappedBy="adventure")
     */
    #[Groups(['read:DataAdventure'])]
    private $questInAdventures;

    public function __construct()
    {
        $this->playerCharacters = new ArrayCollection();
        $this->npcOnAdventures = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->diceThrows = new ArrayCollection();
        $this->messageInChats = new ArrayCollection();
        $this->lastUpdateItems = new ArrayCollection();
        $this->visitedPlaces = new ArrayCollection();
        $this->questInAdventures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGameMasterNickName(): ?string
    {
        return $this->gameMasterNickName;
    }

    public function setGameMasterNickName(string $gameMasterNickName): self
    {
        $this->gameMasterNickName = $gameMasterNickName;

        return $this;
    }

    /**
     * @return Collection|PlayerCharacter[]
     */
    public function getPlayerCharacters(): Collection
    {
        return $this->playerCharacters;
    }

    public function addPlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if (!$this->playerCharacters->contains($playerCharacter)) {
            $this->playerCharacters[] = $playerCharacter;
            $playerCharacter->setAdventure($this);
        }

        return $this;
    }

    public function removePlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if ($this->playerCharacters->removeElement($playerCharacter)) {
            // set the owning side to null (unless already changed)
            if ($playerCharacter->getAdventure() === $this) {
                $playerCharacter->setAdventure(null);
            }
        }

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
            $npcOnAdventure->setAdventure($this);
        }

        return $this;
    }

    public function removeNpcOnAdventure(NpcOnAdventure $npcOnAdventure): self
    {
        if ($this->npcOnAdventures->removeElement($npcOnAdventure)) {
            // set the owning side to null (unless already changed)
            if ($npcOnAdventure->getAdventure() === $this) {
                $npcOnAdventure->setAdventure(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setAdventure($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getAdventure() === $this) {
                $document->setAdventure(null);
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
            $diceThrow->setAdventure($this);
        }

        return $this;
    }

    public function removeDiceThrow(DiceThrow $diceThrow): self
    {
        if ($this->diceThrows->removeElement($diceThrow)) {
            // set the owning side to null (unless already changed)
            if ($diceThrow->getAdventure() === $this) {
                $diceThrow->setAdventure(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MessageInChat[]
     */
    public function getMessageInChats(): Collection
    {
        return $this->messageInChats;
    }

    public function addMessageInChat(MessageInChat $messageInChat): self
    {
        if (!$this->messageInChats->contains($messageInChat)) {
            $this->messageInChats[] = $messageInChat;
            $messageInChat->setAdventure($this);
        }

        return $this;
    }

    public function removeMessageInChat(MessageInChat $messageInChat): self
    {
        if ($this->messageInChats->removeElement($messageInChat)) {
            // set the owning side to null (unless already changed)
            if ($messageInChat->getAdventure() === $this) {
                $messageInChat->setAdventure(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LastUpdateItem[]
     */
    public function getLastUpdateItems(): Collection
    {
        return $this->lastUpdateItems;
    }

    public function addLastUpdateItem(LastUpdateItem $lastUpdateItem): self
    {
        if (!$this->lastUpdateItems->contains($lastUpdateItem)) {
            $this->lastUpdateItems[] = $lastUpdateItem;
            $lastUpdateItem->setAdventure($this);
        }

        return $this;
    }

    public function removeLastUpdateItem(LastUpdateItem $lastUpdateItem): self
    {
        if ($this->lastUpdateItems->removeElement($lastUpdateItem)) {
            // set the owning side to null (unless already changed)
            if ($lastUpdateItem->getAdventure() === $this) {
                $lastUpdateItem->setAdventure(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    /**
     * @return Collection|VisitedPlace[]
     */
    public function getVisitedPlaces(): Collection
    {
        return $this->visitedPlaces;
    }

    public function addVisitedPlace(VisitedPlace $visitedPlace): self
    {
        if (!$this->visitedPlaces->contains($visitedPlace)) {
            $this->visitedPlaces[] = $visitedPlace;
            $visitedPlace->setAdventure($this);
        }

        return $this;
    }

    public function removeVisitedPlace(VisitedPlace $visitedPlace): self
    {
        if ($this->visitedPlaces->removeElement($visitedPlace)) {
            // set the owning side to null (unless already changed)
            if ($visitedPlace->getAdventure() === $this) {
                $visitedPlace->setAdventure(null);
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
            $questInAdventure->setAdventure($this);
        }

        return $this;
    }

    public function removeQuestInAdventure(QuestInAdventure $questInAdventure): self
    {
        if ($this->questInAdventures->removeElement($questInAdventure)) {
            // set the owning side to null (unless already changed)
            if ($questInAdventure->getAdventure() === $this) {
                $questInAdventure->setAdventure(null);
            }
        }

        return $this;
    }
}
