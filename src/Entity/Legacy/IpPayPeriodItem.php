<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ip_pay_period_item')]
class IpPayPeriodItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', name: 'pay_period_id')]
    private int $payPeriodId;

    #[ORM\Column(type: 'float', name: 'disposable_amount')]
    private float $disposableAmount;

    #[ORM\Column(type: 'float', name: 'remaining_amount')]
    private float $remainingAmount;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPayPeriodId(): int
    {
        return $this->payPeriodId;
    }

    public function setPayPeriodId(int $payPeriodId): self
    {
        $this->payPeriodId = $payPeriodId;

        return $this;
    }

    public function getDisposableAmount(): float
    {
        return $this->disposableAmount;
    }

    public function setDisposableAmount(float $disposableAmount): self
    {
        $this->disposableAmount = $disposableAmount;

        return $this;
    }

    public function getRemainingAmount(): float
    {
        return $this->remainingAmount;
    }

    public function setRemainingAmount(float $remainingAmount): self
    {
        $this->remainingAmount = $remainingAmount;

        return $this;
    }

}
