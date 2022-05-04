<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SkillDevelopedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SkillDevelopedRepository::class)
 */
#[ApiResource()]
class SkillDeveloped
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="skillDevelopeds")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $skill;


    /**
     * @ORM\OneToMany(targetEntity=SkillInAction::class, mappedBy="skillDeveloped")
     */
    private $skillInActions;

    /**
     * @ORM\ManyToOne(targetEntity=PlayerCharacter::class, inversedBy="skillDevelopeds")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:CharacterOfPlayer'])]
    private $playerCharacter;

    public function __construct()
    {
        $this->skillInActions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(?Skill $skill): self
    {
        $this->skill = $skill;

        return $this;
    }


    /**
     * @return Collection|SkillInAction[]
     */
    public function getSkillInActions(): Collection
    {
        return $this->skillInActions;
    }

    public function addSkillInAction(SkillInAction $skillInAction): self
    {
        if (!$this->skillInActions->contains($skillInAction)) {
            $this->skillInActions[] = $skillInAction;
            $skillInAction->setSkillDeveloped($this);
        }

        return $this;
    }

    public function removeSkillInAction(SkillInAction $skillInAction): self
    {
        if ($this->skillInActions->removeElement($skillInAction)) {
            // set the owning side to null (unless already changed)
            if ($skillInAction->getSkillDeveloped() === $this) {
                $skillInAction->setSkillDeveloped(null);
            }
        }

        return $this;
    }

    public function getPlayerCharacter(): ?PlayerCharacter
    {
        return $this->playerCharacter;
    }

    public function setPlayerCharacter(?PlayerCharacter $playerCharacter): self
    {
        $this->playerCharacter = $playerCharacter;

        return $this;
    }
}
