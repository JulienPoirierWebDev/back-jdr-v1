<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FrontierBetweenPlacesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FrontierBetweenPlacesRepository::class)
 */
#[ApiResource()]
class FrontierBetweenPlaces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:DataAdventure'])]
    private $connectionType;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="frontierBetweenPlaces")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $placeConnected1;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="frontierBetweenPlaces")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:DataAdventure'])]
    private $placeConnected2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConnectionType(): ?string
    {
        return $this->connectionType;
    }

    public function setConnectionType(string $connectionType): self
    {
        $this->connectionType = $connectionType;

        return $this;
    }

    public function getPlaceConnected1(): ?Place
    {
        return $this->placeConnected1;
    }

    public function setPlaceConnected1(?Place $placeConnected1): self
    {
        $this->placeConnected1 = $placeConnected1;

        return $this;
    }

    public function getPlaceConnected2(): ?Place
    {
        return $this->placeConnected2;
    }

    public function setPlaceConnected2(?Place $placeConnected2): self
    {
        $this->placeConnected2 = $placeConnected2;

        return $this;
    }
}
