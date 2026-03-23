<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ae_title_match')]
class AeTitleMatch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', name: 'rocket_money_id')]
    private int $rocketMoneyId;

    #[ORM\Column(type: 'string', length: 255, name: 'rocket_money_title')]
    private string $rocketMoneyTitle;

    #[ORM\Column(type: 'string', length: 255, name: 'rocket_money_short_title')]
    private string $rocketMoneyShortTitle;

    #[ORM\Column(type: 'float', name: 'rocket_money_amount')]
    private float $rocketMoneyAmount;

    #[ORM\Column(type: 'integer', name: 'rocket_money_date')]
    private int $rocketMoneyDate;

    #[ORM\Column(type: 'integer', name: 'expenses_app_id')]
    private int $expensesAppId;

    #[ORM\Column(type: 'string', length: 255, name: 'expenses_app_title')]
    private string $expensesAppTitle;

    #[ORM\Column(type: 'string', length: 255, name: 'expenses_app_short_title')]
    private string $expensesAppShortTitle;

    #[ORM\Column(type: 'float', name: 'expenses_app_amount')]
    private float $expensesAppAmount;

    #[ORM\Column(type: 'integer', name: 'expenses_app_date')]
    private int $expensesAppDate;

    #[ORM\Column(type: 'integer', nullable: true, name: 'rocket_money_index')]
    private ?int $rocketMoneyIndex = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'expenses_app_index')]
    private ?int $expensesAppIndex = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getRocketMoneyId(): int
    {
        return $this->rocketMoneyId;
    }

    public function setRocketMoneyId(int $rocketMoneyId): self
    {
        $this->rocketMoneyId = $rocketMoneyId;

        return $this;
    }

    public function getRocketMoneyTitle(): string
    {
        return $this->rocketMoneyTitle;
    }

    public function setRocketMoneyTitle(string $rocketMoneyTitle): self
    {
        $this->rocketMoneyTitle = $rocketMoneyTitle;

        return $this;
    }

    public function getRocketMoneyShortTitle(): string
    {
        return $this->rocketMoneyShortTitle;
    }

    public function setRocketMoneyShortTitle(string $rocketMoneyShortTitle): self
    {
        $this->rocketMoneyShortTitle = $rocketMoneyShortTitle;

        return $this;
    }

    public function getRocketMoneyAmount(): float
    {
        return $this->rocketMoneyAmount;
    }

    public function setRocketMoneyAmount(float $rocketMoneyAmount): self
    {
        $this->rocketMoneyAmount = $rocketMoneyAmount;

        return $this;
    }

    public function getRocketMoneyDate(): int
    {
        return $this->rocketMoneyDate;
    }

    public function setRocketMoneyDate(int $rocketMoneyDate): self
    {
        $this->rocketMoneyDate = $rocketMoneyDate;

        return $this;
    }

    public function getExpensesAppId(): int
    {
        return $this->expensesAppId;
    }

    public function setExpensesAppId(int $expensesAppId): self
    {
        $this->expensesAppId = $expensesAppId;

        return $this;
    }

    public function getExpensesAppTitle(): string
    {
        return $this->expensesAppTitle;
    }

    public function setExpensesAppTitle(string $expensesAppTitle): self
    {
        $this->expensesAppTitle = $expensesAppTitle;

        return $this;
    }

    public function getExpensesAppShortTitle(): string
    {
        return $this->expensesAppShortTitle;
    }

    public function setExpensesAppShortTitle(string $expensesAppShortTitle): self
    {
        $this->expensesAppShortTitle = $expensesAppShortTitle;

        return $this;
    }

    public function getExpensesAppAmount(): float
    {
        return $this->expensesAppAmount;
    }

    public function setExpensesAppAmount(float $expensesAppAmount): self
    {
        $this->expensesAppAmount = $expensesAppAmount;

        return $this;
    }

    public function getExpensesAppDate(): int
    {
        return $this->expensesAppDate;
    }

    public function setExpensesAppDate(int $expensesAppDate): self
    {
        $this->expensesAppDate = $expensesAppDate;

        return $this;
    }

    public function getRocketMoneyIndex(): ?int
    {
        return $this->rocketMoneyIndex;
    }

    public function setRocketMoneyIndex(?int $rocketMoneyIndex): self
    {
        $this->rocketMoneyIndex = $rocketMoneyIndex;

        return $this;
    }

    public function getExpensesAppIndex(): ?int
    {
        return $this->expensesAppIndex;
    }

    public function setExpensesAppIndex(?int $expensesAppIndex): self
    {
        $this->expensesAppIndex = $expensesAppIndex;

        return $this;
    }

}
