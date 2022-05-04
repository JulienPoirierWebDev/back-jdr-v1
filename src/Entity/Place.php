<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
#[ApiResource()]
class Place
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['read:DataAdventure'])]
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="places")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity=PlaceType::class, inversedBy="places")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $placeType;

    /**
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="places")
     */
    private $userWhoCreate;

    /**
     * @ORM\OneToMany(targetEntity=FrontierBetweenPlaces::class, mappedBy="placeConnected1")
     */
    #[Groups(['read:DataAdventure'])]
    private $frontierBetweenPlaces;

    /**
     * @ORM\OneToMany(targetEntity=VisitedPlace::class, mappedBy="place")
     */
    #[Groups(['read:DataAdventure'])]
    private $visitedPlaces;

    /**
     * @ORM\OneToMany(targetEntity=Goal::class, mappedBy="targetPlace")
     */
    private $goals;

    public function __construct()
    {
        $this->frontierBetweenPlaces = new ArrayCollection();
        $this->visitedPlaces = new ArrayCollection();
        $this->goals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getPlaceType(): ?PlaceType
    {
        return $this->placeType;
    }

    public function setPlaceType(?PlaceType $placeType): self
    {
        $this->placeType = $placeType;

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
     * @return Collection|FrontierBetweenPlaces[]
     */
    public function getFrontierBetweenPlaces(): Collection
    {
        return $this->frontierBetweenPlaces;
    }

    public function addFrontierBetweenPlace(FrontierBetweenPlaces $frontierBetweenPlace): self
    {
        if (!$this->frontierBetweenPlaces->contains($frontierBetweenPlace)) {
            $this->frontierBetweenPlaces[] = $frontierBetweenPlace;
            $frontierBetweenPlace->setPlaceConnected1($this);
        }

        return $this;
    }

    public function removeFrontierBetweenPlace(FrontierBetweenPlaces $frontierBetweenPlace): self
    {
        if ($this->frontierBetweenPlaces->removeElement($frontierBetweenPlace)) {
            // set the owning side to null (unless already changed)
            if ($frontierBetweenPlace->getPlaceConnected1() === $this) {
                $frontierBetweenPlace->setPlaceConnected1(null);
            }
        }

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
            $visitedPlace->setPlace($this);
        }

        return $this;
    }

    public function removeVisitedPlace(VisitedPlace $visitedPlace): self
    {
        if ($this->visitedPlaces->removeElement($visitedPlace)) {
            // set the owning side to null (unless already changed)
            if ($visitedPlace->getPlace() === $this) {
                $visitedPlace->setPlace(null);
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
            $goal->setTargetPlace($this);
        }

        return $this;
    }

    public function removeGoal(Goal $goal): self
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getTargetPlace() === $this) {
                $goal->setTargetPlace(null);
            }
        }

        return $this;
    }
}
