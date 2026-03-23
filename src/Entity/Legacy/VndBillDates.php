<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'vnd_bill_dates')]
class VndBillDates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'vnd_id')]
    private int $vndId;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'vnd_bill_desc')]
    private ?string $vndBillDesc = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'vnd_amount')]
    private ?float $vndAmount = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'vnd_date')]
    private ?DateTimeInterface $vndDate = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'vnd_user_id')]
    private ?int $vndUserId = null;

    #[ORM\Column(type: 'integer', name: 'vnd_is_auto')]
    private int $vndIsAuto;

    #[ORM\Column(type: 'boolean', name: 'vnd_is_future')]
    private bool $vndIsFuture;

    #[ORM\Column(type: 'boolean', name: 'is_heavy')]
    private bool $isHeavy;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'vnd_frequency')]
    private ?string $vndFrequency = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'vnd_frequency_type')]
    private ?string $vndFrequencyType = null;

    #[ORM\Column(type: 'integer', name: 'can_be_multiplied_by')]
    private int $canBeMultipliedBy;

    #[ORM\Column(type: 'integer')]
    private int $multiplier;

    public function getVndId(): int
    {
        return $this->vndId;
    }

    public function setVndId(int $vndId): self
    {
        $this->vndId = $vndId;

        return $this;
    }

    public function getVndBillDesc(): ?string
    {
        return $this->vndBillDesc;
    }

    public function setVndBillDesc(?string $vndBillDesc): self
    {
        $this->vndBillDesc = $vndBillDesc;

        return $this;
    }

    public function getVndAmount(): ?float
    {
        return $this->vndAmount;
    }

    public function setVndAmount(?float $vndAmount): self
    {
        $this->vndAmount = $vndAmount;

        return $this;
    }

    public function getVndDate(): ?DateTimeInterface
    {
        return $this->vndDate;
    }

    public function setVndDate(?DateTimeInterface $vndDate): self
    {
        $this->vndDate = $vndDate;

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

    public function getVndIsAuto(): int
    {
        return $this->vndIsAuto;
    }

    public function setVndIsAuto(int $vndIsAuto): self
    {
        $this->vndIsAuto = $vndIsAuto;

        return $this;
    }

    public function getVndIsFuture(): bool
    {
        return $this->vndIsFuture;
    }

    public function setVndIsFuture(bool $vndIsFuture): self
    {
        $this->vndIsFuture = $vndIsFuture;

        return $this;
    }

    public function getIsHeavy(): bool
    {
        return $this->isHeavy;
    }

    public function setIsHeavy(bool $isHeavy): self
    {
        $this->isHeavy = $isHeavy;

        return $this;
    }

    public function getVndFrequency(): ?string
    {
        return $this->vndFrequency;
    }

    public function setVndFrequency(?string $vndFrequency): self
    {
        $this->vndFrequency = $vndFrequency;

        return $this;
    }

    public function getVndFrequencyType(): ?string
    {
        return $this->vndFrequencyType;
    }

    public function setVndFrequencyType(?string $vndFrequencyType): self
    {
        $this->vndFrequencyType = $vndFrequencyType;

        return $this;
    }

    public function getCanBeMultipliedBy(): int
    {
        return $this->canBeMultipliedBy;
    }

    public function setCanBeMultipliedBy(int $canBeMultipliedBy): self
    {
        $this->canBeMultipliedBy = $canBeMultipliedBy;

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

}
