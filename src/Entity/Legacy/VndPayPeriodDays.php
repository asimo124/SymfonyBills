<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'vnd_pay_period_days')]
class VndPayPeriodDays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'vnd_id')]
    private int $vndId;

    #[ORM\Column(type: 'integer', name: 'month_num')]
    private int $monthNum;

    #[ORM\Column(type: 'integer', name: 'pay_period_num')]
    private int $payPeriodNum;

    #[ORM\Column(type: 'integer', name: 'num_days')]
    private int $numDays;

    public function getVndId(): int
    {
        return $this->vndId;
    }

    public function setVndId(int $vndId): self
    {
        $this->vndId = $vndId;

        return $this;
    }

    public function getMonthNum(): int
    {
        return $this->monthNum;
    }

    public function setMonthNum(int $monthNum): self
    {
        $this->monthNum = $monthNum;

        return $this;
    }

    public function getPayPeriodNum(): int
    {
        return $this->payPeriodNum;
    }

    public function setPayPeriodNum(int $payPeriodNum): self
    {
        $this->payPeriodNum = $payPeriodNum;

        return $this;
    }

    public function getNumDays(): int
    {
        return $this->numDays;
    }

    public function setNumDays(int $numDays): self
    {
        $this->numDays = $numDays;

        return $this;
    }

}
