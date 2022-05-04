<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 */
#[ApiResource()]
class Zone
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
     * @ORM\Column(type="boolean")
     */
    private $userCreation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="zones")
     */
    private $userWhoCreate;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:DataAdventure'])]
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Country::class, mappedBy="zone")
     */
    private $countries;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
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
            $country->setZone($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->countries->removeElement($country)) {
            // set the owning side to null (unless already changed)
            if ($country->getZone() === $this) {
                $country->setZone(null);
            }
        }

        return $this;
    }
}
