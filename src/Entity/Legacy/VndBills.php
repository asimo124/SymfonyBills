<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'vnd_bills')]
class VndBills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'vnd_id')]
    private int $vndId;

    #[ORM\Column(type: 'integer', nullable: true, name: 'vnd_user_id')]
    private ?int $vndUserId = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'vnd_bill')]
    private ?string $vndBill = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $amount = null;

    #[ORM\Column(type: 'integer', name: 'vnd_is_auto')]
    private int $vndIsAuto;

    #[ORM\Column(type: 'string', length: 300, nullable: true, name: 'vnd_frequency_notes')]
    private ?string $vndFrequencyNotes = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true, name: 'vnd_frequency')]
    private ?string $vndFrequency = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'vnd_frequency_type')]
    private ?string $vndFrequencyType = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'vnd_frequency_value')]
    private ?string $vndFrequencyValue = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'vnd_entrydate')]
    private ?DateTimeInterface $vndEntrydate = null;

    #[ORM\Column(type: 'string', length: 50, nullable: true, name: 'vnd_entryip')]
    private ?string $vndEntryip = null;

    #[ORM\Column(type: 'integer')]
    private int $multiplier;

    #[ORM\Column(type: 'integer', name: 'is_future')]
    private int $isFuture;

    #[ORM\Column(type: 'boolean', name: 'is_heavy')]
    private bool $isHeavy;

    #[ORM\Column(type: 'boolean', name: 'watch_flag')]
    private bool $watchFlag;

    #[ORM\Column(type: 'date', nullable: true, name: 'end_date')]
    private ?DateTimeInterface $endDate = null;

    #[ORM\Column(type: 'string', length: 100, nullable: true, name: 'vnd_frequency_value_original')]
    private ?string $vndFrequencyValueOriginal = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'audit_regex')]
    private ?string $auditRegex = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'audit_keyword1')]
    private ?string $auditKeyword1 = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'audit_keyword2')]
    private ?string $auditKeyword2 = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'start_date')]
    private ?DateTimeInterface $startDate = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'upcoming_purchase_id')]
    private ?int $upcomingPurchaseId = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'pay_period_id')]
    private ?int $payPeriodId = null;

    #[ORM\Column(type: 'boolean')]
    private bool $collapsed;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $index = null;

    #[ORM\Column(type: 'integer', name: 'can_be_multiplied_by')]
    private int $canBeMultipliedBy;

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

    public function getVndBill(): ?string
    {
        return $this->vndBill;
    }

    public function setVndBill(?string $vndBill): self
    {
        $this->vndBill = $vndBill;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

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

    public function getVndFrequencyNotes(): ?string
    {
        return $this->vndFrequencyNotes;
    }

    public function setVndFrequencyNotes(?string $vndFrequencyNotes): self
    {
        $this->vndFrequencyNotes = $vndFrequencyNotes;

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

    public function getVndFrequencyValue(): ?string
    {
        return $this->vndFrequencyValue;
    }

    public function setVndFrequencyValue(?string $vndFrequencyValue): self
    {
        $this->vndFrequencyValue = $vndFrequencyValue;

        return $this;
    }

    public function getVndEntrydate(): ?DateTimeInterface
    {
        return $this->vndEntrydate;
    }

    public function setVndEntrydate(?DateTimeInterface $vndEntrydate): self
    {
        $this->vndEntrydate = $vndEntrydate;

        return $this;
    }

    public function getVndEntryip(): ?string
    {
        return $this->vndEntryip;
    }

    public function setVndEntryip(?string $vndEntryip): self
    {
        $this->vndEntryip = $vndEntryip;

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

    public function getIsFuture(): int
    {
        return $this->isFuture;
    }

    public function setIsFuture(int $isFuture): self
    {
        $this->isFuture = $isFuture;

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

    public function getWatchFlag(): bool
    {
        return $this->watchFlag;
    }

    public function setWatchFlag(bool $watchFlag): self
    {
        $this->watchFlag = $watchFlag;

        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getVndFrequencyValueOriginal(): ?string
    {
        return $this->vndFrequencyValueOriginal;
    }

    public function setVndFrequencyValueOriginal(?string $vndFrequencyValueOriginal): self
    {
        $this->vndFrequencyValueOriginal = $vndFrequencyValueOriginal;

        return $this;
    }

    public function getAuditRegex(): ?string
    {
        return $this->auditRegex;
    }

    public function setAuditRegex(?string $auditRegex): self
    {
        $this->auditRegex = $auditRegex;

        return $this;
    }

    public function getAuditKeyword1(): ?string
    {
        return $this->auditKeyword1;
    }

    public function setAuditKeyword1(?string $auditKeyword1): self
    {
        $this->auditKeyword1 = $auditKeyword1;

        return $this;
    }

    public function getAuditKeyword2(): ?string
    {
        return $this->auditKeyword2;
    }

    public function setAuditKeyword2(?string $auditKeyword2): self
    {
        $this->auditKeyword2 = $auditKeyword2;

        return $this;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getUpcomingPurchaseId(): ?int
    {
        return $this->upcomingPurchaseId;
    }

    public function setUpcomingPurchaseId(?int $upcomingPurchaseId): self
    {
        $this->upcomingPurchaseId = $upcomingPurchaseId;

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

    public function getCollapsed(): bool
    {
        return $this->collapsed;
    }

    public function setCollapsed(bool $collapsed): self
    {
        $this->collapsed = $collapsed;

        return $this;
    }

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(?int $index): self
    {
        $this->index = $index;

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

}
