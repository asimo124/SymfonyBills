<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'ip_pay_period')]
class IpPayPeriod
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 75, name: 'pay_period')]
    private string $payPeriod;

    #[ORM\Column(type: 'date', name: 'pay_period_date')]
    private DateTimeInterface $payPeriodDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPayPeriod(): string
    {
        return $this->payPeriod;
    }

    public function setPayPeriod(string $payPeriod): self
    {
        $this->payPeriod = $payPeriod;

        return $this;
    }

    public function getPayPeriodDate(): DateTimeInterface
    {
        return $this->payPeriodDate;
    }

    public function setPayPeriodDate(DateTimeInterface $payPeriodDate): self
    {
        $this->payPeriodDate = $payPeriodDate;

        return $this;
    }

}
