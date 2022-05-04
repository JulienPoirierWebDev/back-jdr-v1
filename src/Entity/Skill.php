<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
#[ApiResource()]
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SkillDeveloped::class, mappedBy="skill")
     */
    private $skillDevelopeds;

    public function __construct()
    {
        $this->skillDevelopeds = new ArrayCollection();
    }

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
     * @return Collection|SkillDeveloped[]
     */
    public function getSkillDevelopeds(): Collection
    {
        return $this->skillDevelopeds;
    }

    public function addSkillDeveloped(SkillDeveloped $skillDeveloped): self
    {
        if (!$this->skillDevelopeds->contains($skillDeveloped)) {
            $this->skillDevelopeds[] = $skillDeveloped;
            $skillDeveloped->setSkill($this);
        }

        return $this;
    }

    public function removeSkillDeveloped(SkillDeveloped $skillDeveloped): self
    {
        if ($this->skillDevelopeds->removeElement($skillDeveloped)) {
            // set the owning side to null (unless already changed)
            if ($skillDeveloped->getSkill() === $this) {
                $skillDeveloped->setSkill(null);
            }
        }

        return $this;
    }
}
