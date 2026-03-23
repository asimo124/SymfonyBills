<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ae_rocket_money_item')]
class AeRocketMoneyItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Date')]
    private ?string $date = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Original_Date')]
    private ?string $originalDate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Account_Type')]
    private ?string $accountType = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Account_Name')]
    private ?string $accountName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Account_Number')]
    private ?string $accountNumber = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Institution_Name')]
    private ?string $institutionName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Name')]
    private ?string $name = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Custom_Name')]
    private ?string $customName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Amount')]
    private ?string $amount = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Description')]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Category')]
    private ?string $category = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Note')]
    private ?string $note = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Ignored_From')]
    private ?string $ignoredFrom = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'Tax_Deductible')]
    private ?string $taxDeductible = null;

    #[ORM\Column(type: 'boolean', name: 'Collapsed')]
    private bool $collapsed;

    #[ORM\Column(type: 'integer', nullable: true, name: 'Index')]
    private ?int $index = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getOriginalDate(): ?string
    {
        return $this->originalDate;
    }

    public function setOriginalDate(?string $originalDate): self
    {
        $this->originalDate = $originalDate;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCustomName(): ?string
    {
        return $this->customName;
    }

    public function setCustomName(?string $customName): self
    {
        $this->customName = $customName;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIgnoredFrom(): ?string
    {
        return $this->ignoredFrom;
    }

    public function setIgnoredFrom(?string $ignoredFrom): self
    {
        $this->ignoredFrom = $ignoredFrom;

        return $this;
    }

    public function getTaxDeductible(): ?string
    {
        return $this->taxDeductible;
    }

    public function setTaxDeductible(?string $taxDeductible): self
    {
        $this->taxDeductible = $taxDeductible;

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

}
