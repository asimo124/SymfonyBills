<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'fs_food')]
class FsFood
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'integer', nullable: true, name: 'category_id')]
    private ?int $categoryId = null;

    #[ORM\Column(type: 'boolean', name: 'is_inflammation')]
    private bool $isInflammation;

    #[ORM\Column(type: 'float', name: 'percentage_towards_inflammation')]
    private float $percentageTowardsInflammation;

    #[ORM\Column(type: 'float', name: 'test_value')]
    private float $testValue;

    #[ORM\Column(type: 'float', name: 'test_inflammation_index')]
    private float $testInflammationIndex;

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

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getIsInflammation(): bool
    {
        return $this->isInflammation;
    }

    public function setIsInflammation(bool $isInflammation): self
    {
        $this->isInflammation = $isInflammation;

        return $this;
    }

    public function getPercentageTowardsInflammation(): float
    {
        return $this->percentageTowardsInflammation;
    }

    public function setPercentageTowardsInflammation(float $percentageTowardsInflammation): self
    {
        $this->percentageTowardsInflammation = $percentageTowardsInflammation;

        return $this;
    }

    public function getTestValue(): float
    {
        return $this->testValue;
    }

    public function setTestValue(float $testValue): self
    {
        $this->testValue = $testValue;

        return $this;
    }

    public function getTestInflammationIndex(): float
    {
        return $this->testInflammationIndex;
    }

    public function setTestInflammationIndex(float $testInflammationIndex): self
    {
        $this->testInflammationIndex = $testInflammationIndex;

        return $this;
    }

}
