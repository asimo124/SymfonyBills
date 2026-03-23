<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'hth_day_times')]
class HthDayTimes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'time_desc')]
    private ?string $timeDesc = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTimeDesc(): ?string
    {
        return $this->timeDesc;
    }

    public function setTimeDesc(?string $timeDesc): self
    {
        $this->timeDesc = $timeDesc;

        return $this;
    }

}
