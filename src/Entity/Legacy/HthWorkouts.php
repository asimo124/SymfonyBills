<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'hth_workouts')]
class HthWorkouts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'workout_date')]
    private ?string $workoutDate = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'workout_type_id')]
    private ?int $workoutTypeId = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'duration_mins')]
    private ?int $durationMins = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'calories_burned')]
    private ?int $caloriesBurned = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $entrydate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'workout_desc')]
    private ?string $workoutDesc = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'workout_time_id')]
    private ?int $workoutTimeId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getWorkoutDate(): ?string
    {
        return $this->workoutDate;
    }

    public function setWorkoutDate(?string $workoutDate): self
    {
        $this->workoutDate = $workoutDate;

        return $this;
    }

    public function getWorkoutTypeId(): ?int
    {
        return $this->workoutTypeId;
    }

    public function setWorkoutTypeId(?int $workoutTypeId): self
    {
        $this->workoutTypeId = $workoutTypeId;

        return $this;
    }

    public function getDurationMins(): ?int
    {
        return $this->durationMins;
    }

    public function setDurationMins(?int $durationMins): self
    {
        $this->durationMins = $durationMins;

        return $this;
    }

    public function getCaloriesBurned(): ?int
    {
        return $this->caloriesBurned;
    }

    public function setCaloriesBurned(?int $caloriesBurned): self
    {
        $this->caloriesBurned = $caloriesBurned;

        return $this;
    }

    public function getEntrydate(): ?DateTimeInterface
    {
        return $this->entrydate;
    }

    public function setEntrydate(?DateTimeInterface $entrydate): self
    {
        $this->entrydate = $entrydate;

        return $this;
    }

    public function getWorkoutDesc(): ?string
    {
        return $this->workoutDesc;
    }

    public function setWorkoutDesc(?string $workoutDesc): self
    {
        $this->workoutDesc = $workoutDesc;

        return $this;
    }

    public function getWorkoutTimeId(): ?int
    {
        return $this->workoutTimeId;
    }

    public function setWorkoutTimeId(?int $workoutTimeId): self
    {
        $this->workoutTimeId = $workoutTimeId;

        return $this;
    }

}
