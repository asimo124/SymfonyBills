<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'dt_paycheck_disposable')]
class DtPaycheckDisposable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', name: 'paycheck_date')]
    private DateTimeInterface $paycheckDate;

    #[ORM\Column(type: 'decimal', name: 'disposable_amount')]
    private string $disposableAmount;

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

    public function getDisposableAmount(): string
    {
        return $this->disposableAmount;
    }

    public function setDisposableAmount(string $disposableAmount): self
    {
        $this->disposableAmount = $disposableAmount;

        return $this;
    }

}
