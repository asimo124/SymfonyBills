<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'tax_expense')]
class TaxExpense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 800, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'expense_category_id')]
    private ?int $expenseCategoryId = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $amount = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $vendor = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'created_at')]
    private ?int $createdAt = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'updated_at')]
    private ?int $updatedAt = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getExpenseCategoryId(): ?int
    {
        return $this->expenseCategoryId;
    }

    public function setExpenseCategoryId(?int $expenseCategoryId): self
    {
        $this->expenseCategoryId = $expenseCategoryId;

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

    public function getVendor(): ?string
    {
        return $this->vendor;
    }

    public function setVendor(?string $vendor): self
    {
        $this->vendor = $vendor;

        return $this;
    }

    public function getCreatedAt(): ?int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
