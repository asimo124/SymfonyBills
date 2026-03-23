<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ip_upcoming_purchase')]
class IpUpcomingPurchase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', name: 'pay_period_item_id')]
    private int $payPeriodItemId;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $cost = null;

    #[ORM\Column(type: 'float', name: 'amount_to_save')]
    private float $amountToSave;

    #[ORM\Column(type: 'boolean')]
    private bool $moved;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPayPeriodItemId(): int
    {
        return $this->payPeriodItemId;
    }

    public function setPayPeriodItemId(int $payPeriodItemId): self
    {
        $this->payPeriodItemId = $payPeriodItemId;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(?float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getAmountToSave(): float
    {
        return $this->amountToSave;
    }

    public function setAmountToSave(float $amountToSave): self
    {
        $this->amountToSave = $amountToSave;

        return $this;
    }

    public function getMoved(): bool
    {
        return $this->moved;
    }

    public function setMoved(bool $moved): self
    {
        $this->moved = $moved;

        return $this;
    }

}
