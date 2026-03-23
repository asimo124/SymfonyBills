<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'cu_income_change')]
class CuIncomeChange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', name: 'paycheck_date')]
    private DateTimeInterface $paycheckDate;

    #[ORM\Column(type: 'decimal', name: 'current_earnings')]
    private string $currentEarnings;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPaycheckDate(): DateTimeInterface
    {
        return $this->paycheckDate;
    }

    public function setPaycheckDate(DateTimeInterface $paycheckDate): self
    {
        $this->paycheckDate = $paycheckDate;

        return $this;
    }

    public function getCurrentEarnings(): string
    {
        return $this->currentEarnings;
    }

    public function setCurrentEarnings(string $currentEarnings): self
    {
        $this->currentEarnings = $currentEarnings;

        return $this;
    }

}
