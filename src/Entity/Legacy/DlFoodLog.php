<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'dl_food_log')]
class DlFoodLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', name: 'food_id')]
    private int $foodId;

    #[ORM\Column(type: 'decimal')]
    private string $amount;

    #[ORM\Column(type: 'datetime', name: 'date_consumed')]
    private DateTimeInterface $dateConsumed;

    #[ORM\Column(type: 'integer', name: 'meal_of_day_id')]
    private int $mealOfDayId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFoodId(): int
    {
        return $this->foodId;
    }

    public function setFoodId(int $foodId): self
    {
        $this->foodId = $foodId;

        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDateConsumed(): DateTimeInterface
    {
        return $this->dateConsumed;
    }

    public function setDateConsumed(DateTimeInterface $dateConsumed): self
    {
        $this->dateConsumed = $dateConsumed;

        return $this;
    }

    public function getMealOfDayId(): int
    {
        return $this->mealOfDayId;
    }

    public function setMealOfDayId(int $mealOfDayId): self
    {
        $this->mealOfDayId = $mealOfDayId;

        return $this;
    }

}
