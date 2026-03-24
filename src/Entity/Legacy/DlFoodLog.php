<?php

namespace App\Entity\Legacy;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Legacy\DlMacroType;

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

    #[ORM\ManyToOne(targetEntity: DlMealOfDay::class, inversedBy: 'foodLogs')]
    #[ORM\JoinColumn(name: 'meal_of_day_id', referencedColumnName: 'id', nullable: false)]
    private ?DlMealOfDay $mealOfDay = null;

    #[ORM\ManyToOne(targetEntity: DlMacroType::class, inversedBy: 'foodLogs')]
    #[ORM\JoinColumn(name: 'macro_type_id', referencedColumnName: 'id', nullable: false)]
    private ?DlMacroType $macroType = null;

    #[ORM\ManyToOne(targetEntity: DlUnitOfMeasure::class, inversedBy: 'foodLogs')]
    #[ORM\JoinColumn(name: 'unit_of_measure_id', referencedColumnName: 'id', nullable: false)]
    private ?DlUnitOfMeasure $unitOfMeasure = null;

    #[ORM\Column(type: 'decimal')]
    private string $amount;

    #[ORM\Column(type: 'datetime', name: 'date_consumed')]
    private DateTimeInterface $dateConsumed;

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

    public function getMacroType(): ?DlMacroType
    {
        return $this->macroType;
    }

    public function setMacroType(?DlMacroType $macroType): static
    {
        $this->macroType = $macroType;
    }

    public function getUnitOfMeasure(): ?DlUnitOfMeasure
    {
        return $this->unitOfMeasure;
    }

    public function setUnitOfMeasure(?DlUnitOfMeasure $unitOfMeasure): static
    {
        $this->unitOfMeasure = $unitOfMeasure;
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
