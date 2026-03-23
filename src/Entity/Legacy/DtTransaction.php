<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'dt_transaction')]
class DtTransaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', name: 'transaction_date')]
    private DateTimeInterface $transactionDate;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'account_type')]
    private ?string $accountType = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'account_name')]
    private ?string $accountName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'account_number')]
    private ?string $accountNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'institution_name')]
    private ?string $institutionName = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'decimal', nullable: true)]
    private ?string $amount = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $description;

    #[ORM\Column(type: 'integer', nullable: true, name: 'transaction_category_id')]
    private ?int $transactionCategoryId = null;

    #[ORM\Column(type: 'boolean', name: 'is_covered')]
    private bool $isCovered;

    #[ORM\Column(type: 'date', name: 'paycheck_date')]
    private DateTimeInterface $paycheckDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTransactionDate(): DateTimeInterface
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(DateTimeInterface $transactionDate): self
    {
        $this->transactionDate = $transactionDate;

        return $this;
    }

    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    public function setAccountType(?string $accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }

    public function getAccountName(): ?string
    {
        return $this->accountName;
    }

    public function setAccountName(?string $accountName): self
    {
        $this->accountName = $accountName;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getInstitutionName(): ?string
    {
        return $this->institutionName;
    }

    public function setInstitutionName(?string $institutionName): self
    {
        $this->institutionName = $institutionName;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTransactionCategoryId(): ?int
    {
        return $this->transactionCategoryId;
    }

    public function setTransactionCategoryId(?int $transactionCategoryId): self
    {
        $this->transactionCategoryId = $transactionCategoryId;

        return $this;
    }

    public function getIsCovered(): bool
    {
        return $this->isCovered;
    }

    public function setIsCovered(bool $isCovered): self
    {
        $this->isCovered = $isCovered;

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

}
