<?php

namespace App\Entity;

use ApiPlatform\Core\Action\NotFoundAction;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\CheckController;
use App\Controller\HashController;
use App\Controller\MeController;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'check' => [
            'pagination_enabled'=>false,
            'path'=> '/check',
            'method'=>'post',
            'controller'=>CheckController::class,
            'read'=>false,
            'write'=>false,
        ],
        'hash' => [
            'pagination_enabled'=>false,
            'path'=> '/hash',
            'method'=>'post',
            'controller'=>HashController::class,
            'read'=>false,
            'write'=>false,
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
        'get'=> [
            'controller' => NotFoundAction::class,
            'openapi_context' => [
                'summary' => 'hidden',
            ],
            'read' => false,
            'output' => false

        ],
        'me' => [
            'pagination_enabled'=>false,
            'path'=> '/me',
            'method'=>'get',
            'controller'=>MeController::class,
            'read'=>false,
            'openapi_context' => [
                'security' => [['bearerAuth' => []]]
            ]
        ]
    ],
    normalizationContext: ['groups'=>['read:User']]
)]
class User implements UserInterface, JWTUserInterface, \Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:User', 'read:CharacterOfPlayer', 'read:DataAdventure'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    #[Groups(['read:User'])]
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    #[Groups(['read:User'])]
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Adventure::class, mappedBy="user")
     */
    private $adventures;

    /**
     * @ORM\OneToMany(targetEntity=PlayerCharacter::class, mappedBy="user")
     */
    private $playerCharacters;

    /**
     * @ORM\OneToMany(targetEntity=Npc::class, mappedBy="userWhoCreate")
     */
    private $npcs;

    /**
     * @ORM\OneToMany(targetEntity=Zone::class, mappedBy="userWhoCreate")
     */
    private $zones;

    /**
     * @ORM\OneToMany(targetEntity=Country::class, mappedBy="userWhoCreate")
     */
    private $countries;

    /**
     * @ORM\OneToMany(targetEntity=Region::class, mappedBy="userWhoCreate")
     */
    private $regions;

    /**
     * @ORM\OneToMany(targetEntity=Place::class, mappedBy="userWhoCreate")
     */
    private $places;

    /**
     * @ORM\OneToMany(targetEntity=Quest::class, mappedBy="useWhoCreate")
     */
    private $quests;

    /**
     * @ORM\OneToMany(targetEntity=Goal::class, mappedBy="userWhoCreate")
     */
    private $goals;

    /**
     * @ORM\OneToMany(targetEntity=Spell::class, mappedBy="userWhoCreate")
     */
    private $spells;

    /**
     * @ORM\OneToMany(targetEntity=Power::class, mappedBy="userWhoCreate")
     */
    private $powers;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="userWhoCreate")
     */
    private $items;

    public function __construct()
    {
        $this->adventures = new ArrayCollection();
        $this->playerCharacters = new ArrayCollection();
        $this->npcs = new ArrayCollection();
        $this->zones = new ArrayCollection();
        $this->countries = new ArrayCollection();
        $this->regions = new ArrayCollection();
        $this->places = new ArrayCollection();
        $this->quests = new ArrayCollection();
        $this->goals = new ArrayCollection();
        $this->spells = new ArrayCollection();
        $this->powers = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    public static function createFromPayload($username, array $payload)
    {
        $user = new User();
        $user->setId($payload['id']);
        $user->setEmail($username);
        $user->setRoles($payload['roles']);
    return $user;
    }

    /**
     * @return Collection|Adventure[]
     */
    public function getAdventures(): Collection
    {
        return $this->adventures;
    }

    public function addAdventure(Adventure $adventure): self
    {
        if (!$this->adventures->contains($adventure)) {
            $this->adventures[] = $adventure;
            $adventure->setUser($this);
        }

        return $this;
    }

    public function removeAdventure(Adventure $adventure): self
    {
        if ($this->adventures->removeElement($adventure)) {
            // set the owning side to null (unless already changed)
            if ($adventure->getUser() === $this) {
                $adventure->setUser(null);
            }
        }

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
            $playerCharacter->setUser($this);
        }

        return $this;
    }

    public function removePlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if ($this->playerCharacters->removeElement($playerCharacter)) {
            // set the owning side to null (unless already changed)
            if ($playerCharacter->getUser() === $this) {
                $playerCharacter->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Npc[]
     */
    public function getNpcs(): Collection
    {
        return $this->npcs;
    }

    public function addNpc(Npc $npc): self
    {
        if (!$this->npcs->contains($npc)) {
            $this->npcs[] = $npc;
            $npc->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeNpc(Npc $npc): self
    {
        if ($this->npcs->removeElement($npc)) {
            // set the owning side to null (unless already changed)
            if ($npc->getUserWhoCreate() === $this) {
                $npc->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Zone[]
     */
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function addZone(Zone $zone): self
    {
        if (!$this->zones->contains($zone)) {
            $this->zones[] = $zone;
            $zone->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeZone(Zone $zone): self
    {
        if ($this->zones->removeElement($zone)) {
            // set the owning side to null (unless already changed)
            if ($zone->getUserWhoCreate() === $this) {
                $zone->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Country[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->countries->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getUserWhoCreate() === $this) {
                $country->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(Region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeRegion(Region $region): self
    {
        if ($this->regions->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getUserWhoCreate() === $this) {
                $region->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places[] = $place;
            $place->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        if ($this->places->removeElement($place)) {
            // set the owning side to null (unless already changed)
            if ($place->getUserWhoCreate() === $this) {
                $place->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Quest[]
     */
    public function getQuests(): Collection
    {
        return $this->quests;
    }

    public function addQuest(Quest $quest): self
    {
        if (!$this->quests->contains($quest)) {
            $this->quests[] = $quest;
            $quest->setUseWhoCreate($this);
        }

        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->removeElement($quest)) {
            // set the owning side to null (unless already changed)
            if ($quest->getUseWhoCreate() === $this) {
                $quest->setUseWhoCreate(null);
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
            $goal->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeGoal(Goal $goal): self
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getUserWhoCreate() === $this) {
                $goal->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Spell[]
     */
    public function getSpells(): Collection
    {
        return $this->spells;
    }

    public function addSpell(Spell $spell): self
    {
        if (!$this->spells->contains($spell)) {
            $this->spells[] = $spell;
            $spell->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeSpell(Spell $spell): self
    {
        if ($this->spells->removeElement($spell)) {
            // set the owning side to null (unless already changed)
            if ($spell->getUserWhoCreate() === $this) {
                $spell->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Power[]
     */
    public function getPowers(): Collection
    {
        return $this->powers;
    }

    public function addPower(Power $power): self
    {
        if (!$this->powers->contains($power)) {
            $this->powers[] = $power;
            $power->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removePower(Power $power): self
    {
        if ($this->powers->removeElement($power)) {
            // set the owning side to null (unless already changed)
            if ($power->getUserWhoCreate() === $this) {
                $power->setUserWhoCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setUserWhoCreate($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getUserWhoCreate() === $this) {
                $item->setUserWhoCreate(null);
            }
        }

        return $this;
    }
};