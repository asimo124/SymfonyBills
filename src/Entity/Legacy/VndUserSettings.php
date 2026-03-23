<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'vnd_user_settings')]
class VndUserSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'vnd_id')]
    private int $vndId;

    #[ORM\Column(type: 'integer', nullable: true, name: 'vnd_user_id')]
    private ?int $vndUserId = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'vnd_current_balance')]
    private ?float $vndCurrentBalance = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'vnd_pay_date')]
    private ?DateTimeInterface $vndPayDate = null;

    public function getVndId(): int
    {
        return $this->vndId;
    }

    public function setVndId(int $vndId): self
    {
        $this->vndId = $vndId;

        return $this;
    }

    public function getVndUserId(): ?int
    {
        return $this->vndUserId;
    }

    public function setVndUserId(?int $vndUserId): self
    {
        $this->vndUserId = $vndUserId;

        return $this;
    }

    public function getVndCurrentBalance(): ?float
    {
        return $this->vndCurrentBalance;
    }

    public function setVndCurrentBalance(?float $vndCurrentBalance): self
    {
        $this->vndCurrentBalance = $vndCurrentBalance;

        return $this;
    }

    public function getVndPayDate(): ?DateTimeInterface
    {
        return $this->vndPayDate;
    }

    public function setVndPayDate(?DateTimeInterface $vndPayDate): self
    {
        $this->vndPayDate = $vndPayDate;

        return $this;
    }

}
