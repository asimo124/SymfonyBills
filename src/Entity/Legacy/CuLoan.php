<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'cu_loan')]
class CuLoan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'decimal', name: 'debt_owed')]
    private string $debtOwed;

    #[ORM\Column(type: 'decimal', name: 'credit_limit')]
    private string $creditLimit;

    #[ORM\Column(type: 'integer', name: 'sort_order')]
    private int $sortOrder;

    #[ORM\Column(type: 'integer', name: 'milestone_order')]
    private int $milestoneOrder;

    #[ORM\Column(type: 'decimal', name: 'min_payment')]
    private string $minPayment;

    #[ORM\Column(type: 'decimal', name: 'amount_to_principal')]
    private string $amountToPrincipal;

    #[ORM\Column(type: 'integer', nullable: true, name: 'bill_id')]
    private ?int $billId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getDebtOwed(): string
    {
        return $this->debtOwed;
    }

    public function setDebtOwed(string $debtOwed): self
    {
        $this->debtOwed = $debtOwed;

        return $this;
    }

    public function getCreditLimit(): string
    {
        return $this->creditLimit;
    }

    public function setCreditLimit(string $creditLimit): self
    {
        $this->creditLimit = $creditLimit;

        return $this;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getMilestoneOrder(): int
    {
        return $this->milestoneOrder;
    }

    public function setMilestoneOrder(int $milestoneOrder): self
    {
        $this->milestoneOrder = $milestoneOrder;

        return $this;
    }

    public function getMinPayment(): string
    {
        return $this->minPayment;
    }

    public function setMinPayment(string $minPayment): self
    {
        $this->minPayment = $minPayment;

        return $this;
    }

    public function getAmountToPrincipal(): string
    {
        return $this->amountToPrincipal;
    }

    public function setAmountToPrincipal(string $amountToPrincipal): self
    {
        $this->amountToPrincipal = $amountToPrincipal;

        return $this;
    }

    public function getBillId(): ?int
    {
        return $this->billId;
    }

    public function setBillId(?int $billId): self
    {
        $this->billId = $billId;

        return $this;
    }

}
