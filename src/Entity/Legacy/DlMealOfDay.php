<?php

namespace App\Entity\Legacy;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'dl_meal_of_day')]
class DlMealOfDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    /** @var Collection<int, DlFoodLog> */
    #[ORM\OneToMany(targetEntity: DlFoodLog::class, mappedBy: 'mealOfDay')]
    private Collection $foodLogs;

    public function __construct()
    {
        $this->foodLogs = new ArrayCollection();
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, DlFoodLog>
     */
    public function getFoodLogs(): Collection
    {
        return $this->foodLogs;
    }
}

