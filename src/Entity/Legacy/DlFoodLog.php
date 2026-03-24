<?php

namespace App\Entity\Legacy;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'dl_food_log')]
class DlFoodLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: DlFood::class, inversedBy: 'foodLogs')]
    #[ORM\JoinColumn(name: 'food_id', referencedColumnName: 'id', nullable: false)]
    private ?DlFood $food = null;

    #[ORM\ManyToOne(targetEntity: DlMealOfDay::class)]
    #[ORM\JoinColumn(name: 'meal_of_day_id', referencedColumnName: 'id', nullable: false)]
    private ?DlMealOfDay $mealOfDay = null;

    #[ORM\Column(type: 'decimal')]
    private string $amount;

    #[ORM\Column(type: 'datetime', name: 'date_consumed')]
    private DateTimeInterface $dateConsumed;



    public function getAmountTitle(): string
    {
        $unitTitle = $this->getFood()?->getUnitOfMeasure()?->getTitle() ?? '';

        return $this->getAmount().' ('.$unitTitle.')';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFood(): ?DlFood
    {
        return $this->food;
    }

    public function setFood(?DlFood $food): static
    {
        $this->food = $food;

        return $this;
    }

    public function getMealOfDay(): ?DlMealOfDay
    {
        return $this->mealOfDay;
    }

    public function setMealOfDay(?DlMealOfDay $mealOfDay): static
    {
        $this->mealOfDay = $mealOfDay;

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
}
