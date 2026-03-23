<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'vnd_pay_period_bill_date_passed')]
class VndPayPeriodBillDatePassed
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', nullable: true, name: 'bill_date_id')]
    private ?int $billDateId = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'pay_period_id')]
    private ?int $payPeriodId = null;

    #[ORM\Column(type: 'boolean', name: 'is_enabled')]
    private bool $isEnabled;

    #[ORM\Column(type: 'integer')]
    private int $multiplier;

    #[ORM\Column(type: 'date', name: 'bill_date')]
    private DateTimeInterface $billDate;

    #[ORM\Column(type: 'decimal')]
    private string $amount;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBillDateId(): ?int
    {
        return $this->billDateId;
    }

    public function setBillDateId(?int $billDateId): self
    {
        $this->billDateId = $billDateId;

        return $this;
    }

    public function getPayPeriodId(): ?int
    {
        return $this->payPeriodId;
    }

    public function setPayPeriodId(?int $payPeriodId): self
    {
        $this->payPeriodId = $payPeriodId;

        return $this;
    }

    public function getIsEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    public function getMultiplier(): int
    {
        return $this->multiplier;
    }

    public function setMultiplier(int $multiplier): self
    {
        $this->multiplier = $multiplier;

        return $this;
    }

    public function getBillDate(): DateTimeInterface
    {
        return $this->billDate;
    }

    public function setBillDate(DateTimeInterface $billDate): self
    {
        $this->billDate = $billDate;

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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

}
