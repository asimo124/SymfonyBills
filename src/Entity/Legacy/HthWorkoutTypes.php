<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'hth_workout_types')]
class HthWorkoutTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'workout_type')]
    private ?string $workoutType = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getWorkoutType(): ?string
    {
        return $this->workoutType;
    }

    public function setWorkoutType(?string $workoutType): self
    {
        $this->workoutType = $workoutType;

        return $this;
    }

}
