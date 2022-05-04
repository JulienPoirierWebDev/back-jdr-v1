<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\VisitedPlaceByAdventureController;
use App\Repository\VisitedPlaceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VisitedPlaceRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'characterOfAnAdventure' => [
            'pagination_enabled'=>false,
            'path'=> '/visited_places/adventure',
            'method'=>'post',
            'controller'=>VisitedPlaceByAdventureController::class,
            'read'=>false,
            'write'=>false,
        ],
    ]
)]
class VisitedPlace
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:DataAdventure'])]
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="visitedPlaces")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $place;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:DataAdventure'])]
    private $actualPlace;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="visitedPlaces")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $adventure;

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

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getActualPlace(): ?bool
    {
        return $this->actualPlace;
    }

    public function setActualPlace(bool $actualPlace): self
    {
        $this->actualPlace = $actualPlace;

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
}
