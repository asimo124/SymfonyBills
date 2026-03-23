<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'vnd_bills_charge_description_categories')]
class VndBillsChargeDescriptionCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private ?string $desc = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'category_id')]
    private ?int $categoryId = null;

    #[ORM\Column(type: 'float', name: 'min_range')]
    private float $minRange;

    #[ORM\Column(type: 'float', name: 'max_range')]
    private float $maxRange;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDesc(): ?string
    {
        return $this->desc;
    }

    public function setDesc(?string $desc): self
    {
        $this->desc = $desc;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getMinRange(): float
    {
        return $this->minRange;
    }

    public function setMinRange(float $minRange): self
    {
        $this->minRange = $minRange;

        return $this;
    }

    public function getMaxRange(): float
    {
        return $this->maxRange;
    }

    public function setMaxRange(float $maxRange): self
    {
        $this->maxRange = $maxRange;

        return $this;
    }

}
