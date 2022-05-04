<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LastUpdateTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=LastUpdateTypeRepository::class)
 */
#[ApiResource()]
class LastUpdateType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:UpdateItem'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:UpdateItem'])]
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=LastUpdateItem::class, mappedBy="lastUpdateType")
     */
    private $lastUpdateItems;

    public function __construct()
    {
        $this->lastUpdateItems = new ArrayCollection();
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
            $lastUpdateItem->setLastUpdateType($this);
        }

        return $this;
    }

    public function removeLastUpdateItem(LastUpdateItem $lastUpdateItem): self
    {
        if ($this->lastUpdateItems->removeElement($lastUpdateItem)) {
            // set the owning side to null (unless already changed)
            if ($lastUpdateItem->getLastUpdateType() === $this) {
                $lastUpdateItem->setLastUpdateType(null);
            }
        }

        return $this;
    }
}
