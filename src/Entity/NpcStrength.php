<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NpcStrengthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NpcStrengthRepository::class)
 */
#[ApiResource()]
class NpcStrength
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:DataAdventure','read:Npc'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:DataAdventure','read:Npc'])]
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Npc::class, mappedBy="npcStrength")
     */
    private $npcs;

    public function __construct()
    {
        $this->npcs = new ArrayCollection();
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
            $npc->setNpcStrength($this);
        }

        return $this;
    }

    public function removeNpc(Npc $npc): self
    {
        if ($this->npcs->removeElement($npc)) {
            // set the owning side to null (unless already changed)
            if ($npc->getNpcStrength() === $this) {
                $npc->setNpcStrength(null);
            }
        }

        return $this;
    }
}
