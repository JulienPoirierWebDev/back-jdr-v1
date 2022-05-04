<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AvatarIconRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AvatarIconRepository::class)
 */
#[ApiResource(attributes: ["pagination_enabled" => false])]
class AvatarIcon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer', 'read:GroupOfCharacters','read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:CharacterOfPlayer', 'read:GroupOfCharacters','read:CharacterOfPlayer'])]
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=PlayerCharacter::class, mappedBy="avatarIcon")
     */
    private $playerCharacters;

    public function __construct()
    {
        $this->playerCharacters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $playerCharacter->setAvatarIcon($this);
        }

        return $this;
    }

    public function removePlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if ($this->playerCharacters->removeElement($playerCharacter)) {
            // set the owning side to null (unless already changed)
            if ($playerCharacter->getAvatarIcon() === $this) {
                $playerCharacter->setAvatarIcon(null);
            }
        }

        return $this;
    }
}
