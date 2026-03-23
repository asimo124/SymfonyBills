<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'hth_meals')]
class HthMeals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'meal_type')]
    private ?string $mealType = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'meal_desc')]
    private ?string $mealDesc = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'has_gluten')]
    private ?bool $hasGluten = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'organic_level')]
    private ?string $organicLevel = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $calories = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'ate_out')]
    private ?bool $ateOut = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'date_eaten')]
    private ?DateTimeInterface $dateEaten = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'time_eaten_id')]
    private ?int $timeEatenId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMealType(): ?string
    {
        return $this->mealType;
    }

    public function setMealType(?string $mealType): self
    {
        $this->mealType = $mealType;

        return $this;
    }

    public function getMealDesc(): ?string
    {
        return $this->mealDesc;
    }

    public function setMealDesc(?string $mealDesc): self
    {
        $this->mealDesc = $mealDesc;

        return $this;
    }

    public function getHasGluten(): ?bool
    {
        return $this->hasGluten;
    }

    public function setHasGluten(?bool $hasGluten): self
    {
        $this->hasGluten = $hasGluten;

        return $this;
    }

    public function getOrganicLevel(): ?string
    {
        return $this->organicLevel;
    }

    public function setOrganicLevel(?string $organicLevel): self
    {
        $this->organicLevel = $organicLevel;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(?int $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getAteOut(): ?bool
    {
        return $this->ateOut;
    }

    public function setAteOut(?bool $ateOut): self
    {
        $this->ateOut = $ateOut;

        return $this;
    }

    public function getDateEaten(): ?DateTimeInterface
    {
        return $this->dateEaten;
    }

    public function setDateEaten(?DateTimeInterface $dateEaten): self
    {
        $this->dateEaten = $dateEaten;

        return $this;
    }

    public function getTimeEatenId(): ?int
    {
        return $this->timeEatenId;
    }

    public function setTimeEatenId(?int $timeEatenId): self
    {
        $this->timeEatenId = $timeEatenId;

        return $this;
    }

}
