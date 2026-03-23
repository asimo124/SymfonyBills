<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'dp_snapshot')]
class DpSnapshot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', nullable: true, name: 'stage1_start_date')]
    private ?DateTimeInterface $stage1StartDate = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage1_remaining_balance')]
    private ?float $stage1RemainingBalance = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage1_min_payment_principal1')]
    private ?float $stage1MinPaymentPrincipal1 = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage1_mom_principal')]
    private ?float $stage1MomPrincipal = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage1_me_principal')]
    private ?float $stage1MePrincipal = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'stage2_start_date')]
    private ?DateTimeInterface $stage2StartDate = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage2_remaining_balance')]
    private ?float $stage2RemainingBalance = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage2_min_payment_principal1')]
    private ?float $stage2MinPaymentPrincipal1 = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage2_min_payment_principal2')]
    private ?float $stage2MinPaymentPrincipal2 = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage2_mom_principal')]
    private ?float $stage2MomPrincipal = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage2_me_principal')]
    private ?float $stage2MePrincipal = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'stage3_start_date')]
    private ?DateTimeInterface $stage3StartDate = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage3_remaining_balance')]
    private ?float $stage3RemainingBalance = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage3_min_payment_principal1')]
    private ?float $stage3MinPaymentPrincipal1 = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage3_mom_principal')]
    private ?float $stage3MomPrincipal = null;

    #[ORM\Column(type: 'float', nullable: true, name: 'stage3_me_principal')]
    private ?float $stage3MePrincipal = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $entrydate = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getStage1StartDate(): ?DateTimeInterface
    {
        return $this->stage1StartDate;
    }

    public function setStage1StartDate(?DateTimeInterface $stage1StartDate): self
    {
        $this->stage1StartDate = $stage1StartDate;

        return $this;
    }

    public function getStage1RemainingBalance(): ?float
    {
        return $this->stage1RemainingBalance;
    }

    public function setStage1RemainingBalance(?float $stage1RemainingBalance): self
    {
        $this->stage1RemainingBalance = $stage1RemainingBalance;

        return $this;
    }

    public function getStage1MinPaymentPrincipal1(): ?float
    {
        return $this->stage1MinPaymentPrincipal1;
    }

    public function setStage1MinPaymentPrincipal1(?float $stage1MinPaymentPrincipal1): self
    {
        $this->stage1MinPaymentPrincipal1 = $stage1MinPaymentPrincipal1;

        return $this;
    }

    public function getStage1MomPrincipal(): ?float
    {
        return $this->stage1MomPrincipal;
    }

    public function setStage1MomPrincipal(?float $stage1MomPrincipal): self
    {
        $this->stage1MomPrincipal = $stage1MomPrincipal;

        return $this;
    }

    public function getStage1MePrincipal(): ?float
    {
        return $this->stage1MePrincipal;
    }

    public function setStage1MePrincipal(?float $stage1MePrincipal): self
    {
        $this->stage1MePrincipal = $stage1MePrincipal;

        return $this;
    }

    public function getStage2StartDate(): ?DateTimeInterface
    {
        return $this->stage2StartDate;
    }

    public function setStage2StartDate(?DateTimeInterface $stage2StartDate): self
    {
        $this->stage2StartDate = $stage2StartDate;

        return $this;
    }

    public function getStage2RemainingBalance(): ?float
    {
        return $this->stage2RemainingBalance;
    }

    public function setStage2RemainingBalance(?float $stage2RemainingBalance): self
    {
        $this->stage2RemainingBalance = $stage2RemainingBalance;

        return $this;
    }

    public function getStage2MinPaymentPrincipal1(): ?float
    {
        return $this->stage2MinPaymentPrincipal1;
    }

    public function setStage2MinPaymentPrincipal1(?float $stage2MinPaymentPrincipal1): self
    {
        $this->stage2MinPaymentPrincipal1 = $stage2MinPaymentPrincipal1;

        return $this;
    }

    public function getStage2MinPaymentPrincipal2(): ?float
    {
        return $this->stage2MinPaymentPrincipal2;
    }

    public function setStage2MinPaymentPrincipal2(?float $stage2MinPaymentPrincipal2): self
    {
        $this->stage2MinPaymentPrincipal2 = $stage2MinPaymentPrincipal2;

        return $this;
    }

    public function getStage2MomPrincipal(): ?float
    {
        return $this->stage2MomPrincipal;
    }

    public function setStage2MomPrincipal(?float $stage2MomPrincipal): self
    {
        $this->stage2MomPrincipal = $stage2MomPrincipal;

        return $this;
    }

    public function getStage2MePrincipal(): ?float
    {
        return $this->stage2MePrincipal;
    }

    public function setStage2MePrincipal(?float $stage2MePrincipal): self
    {
        $this->stage2MePrincipal = $stage2MePrincipal;

        return $this;
    }

    public function getStage3StartDate(): ?DateTimeInterface
    {
        return $this->stage3StartDate;
    }

    public function setStage3StartDate(?DateTimeInterface $stage3StartDate): self
    {
        $this->stage3StartDate = $stage3StartDate;

        return $this;
    }

    public function getStage3RemainingBalance(): ?float
    {
        return $this->stage3RemainingBalance;
    }

    public function setStage3RemainingBalance(?float $stage3RemainingBalance): self
    {
        $this->stage3RemainingBalance = $stage3RemainingBalance;

        return $this;
    }

    public function getStage3MinPaymentPrincipal1(): ?float
    {
        return $this->stage3MinPaymentPrincipal1;
    }

    public function setStage3MinPaymentPrincipal1(?float $stage3MinPaymentPrincipal1): self
    {
        $this->stage3MinPaymentPrincipal1 = $stage3MinPaymentPrincipal1;

        return $this;
    }

    public function getStage3MomPrincipal(): ?float
    {
        return $this->stage3MomPrincipal;
    }

    public function setStage3MomPrincipal(?float $stage3MomPrincipal): self
    {
        $this->stage3MomPrincipal = $stage3MomPrincipal;

        return $this;
    }

    public function getStage3MePrincipal(): ?float
    {
        return $this->stage3MePrincipal;
    }

    public function setStage3MePrincipal(?float $stage3MePrincipal): self
    {
        $this->stage3MePrincipal = $stage3MePrincipal;

        return $this;
    }

    public function getEntrydate(): ?DateTimeInterface
    {
        return $this->entrydate;
    }

    public function setEntrydate(?DateTimeInterface $entrydate): self
    {
        $this->entrydate = $entrydate;

        return $this;
    }

}
