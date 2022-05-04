<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LastUpdateItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=LastUpdateItemRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post',
        'get' => [
            'normalization_context' => ['groups' => ['read:UpdateItem']],
            'pagination_enabled'=>false,
        ]
])]
class LastUpdateItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:UpdateItem'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=LastUpdateType::class, inversedBy="lastUpdateItems")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:UpdateItem'])]
    private $lastUpdateType;

    /**
     * @ORM\ManyToOne(targetEntity=Adventure::class, inversedBy="lastUpdateItems")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:UpdateItem'])]
    private $adventure;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:UpdateItem'])]
    private $itemTimeStamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastUpdateType(): ?LastUpdateType
    {
        return $this->lastUpdateType;
    }

    public function setLastUpdateType(?LastUpdateType $lastUpdateType): self
    {
        $this->lastUpdateType = $lastUpdateType;

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

    public function getItemTimeStamp(): ?\DateTimeInterface
    {
        return $this->itemTimeStamp;
    }

    public function setItemTimeStamp(\DateTimeInterface $itemTimeStamp): self
    {
        $this->itemTimeStamp = $itemTimeStamp;

        return $this;
    }
}
