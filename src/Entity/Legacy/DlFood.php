<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'dl_food')]
class DlFood
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'integer', name: 'macro_type_id')]
    private int $macroTypeId;

    #[ORM\Column(type: 'integer', nullable: true, name: 'type_id')]
    private ?int $typeId = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'sub_type_id')]
    private ?int $subTypeId = null;

    #[ORM\Column(type: 'boolean', name: 'has_fiber')]
    private bool $hasFiber;

    #[ORM\Column(type: 'decimal', name: 'percent_fiber')]
    private string $percentFiber;

    #[ORM\Column(type: 'decimal', name: 'percent_soluble_fiber')]
    private string $percentSolubleFiber;

    #[ORM\Column(type: 'boolean', name: 'is_soluble_fiber')]
    private bool $isSolubleFiber;

    #[ORM\Column(type: 'boolean', name: 'is_cruciferous')]
    private bool $isCruciferous;

    #[ORM\Column(type: 'integer', name: 'unit_of_measure_id')]
    private int $unitOfMeasureId;

    #[ORM\Column(type: 'decimal', nullable: true, name: 'default_amount')]
    private ?string $defaultAmount = null;

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

    public function getMacroTypeId(): int
    {
        return $this->macroTypeId;
    }

    public function setMacroTypeId(int $macroTypeId): self
    {
        $this->macroTypeId = $macroTypeId;

        return $this;
    }

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function setTypeId(?int $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

    public function getSubTypeId(): ?int
    {
        return $this->subTypeId;
    }

    public function setSubTypeId(?int $subTypeId): self
    {
        $this->subTypeId = $subTypeId;

        return $this;
    }

    public function getHasFiber(): bool
    {
        return $this->hasFiber;
    }

    public function setHasFiber(bool $hasFiber): self
    {
        $this->hasFiber = $hasFiber;

        return $this;
    }

    public function getPercentFiber(): string
    {
        return $this->percentFiber;
    }

    public function setPercentFiber(string $percentFiber): self
    {
        $this->percentFiber = $percentFiber;

        return $this;
    }

    public function getPercentSolubleFiber(): string
    {
        return $this->percentSolubleFiber;
    }

    public function setPercentSolubleFiber(string $percentSolubleFiber): self
    {
        $this->percentSolubleFiber = $percentSolubleFiber;

        return $this;
    }

    public function getIsSolubleFiber(): bool
    {
        return $this->isSolubleFiber;
    }

    public function setIsSolubleFiber(bool $isSolubleFiber): self
    {
        $this->isSolubleFiber = $isSolubleFiber;

        return $this;
    }

    public function getIsCruciferous(): bool
    {
        return $this->isCruciferous;
    }

    public function setIsCruciferous(bool $isCruciferous): self
    {
        $this->isCruciferous = $isCruciferous;

        return $this;
    }

    public function getUnitOfMeasureId(): int
    {
        return $this->unitOfMeasureId;
    }

    public function setUnitOfMeasureId(int $unitOfMeasureId): self
    {
        $this->unitOfMeasureId = $unitOfMeasureId;

        return $this;
    }

    public function getDefaultAmount(): ?string
    {
        return $this->defaultAmount;
    }

    public function setDefaultAmount(?string $defaultAmount): self
    {
        $this->defaultAmount = $defaultAmount;

        return $this;
    }

}
