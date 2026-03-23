<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'ph_pills_taken_history')]
class PhPillsTakenHistory
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'pill_taken_date')]
    private ?DateTimeInterface $pillTakenDate = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'metformin_taken')]
    private ?bool $metforminTaken = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'diaplex_taken')]
    private ?bool $diaplexTaken = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'multivitamin_taken')]
    private ?bool $multivitaminTaken = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'vitamin_d_taken')]
    private ?bool $vitaminDTaken = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'b12_taken')]
    private ?bool $b12Taken = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'b12_complex_taken')]
    private ?bool $b12ComplexTaken = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPillTakenDate(): ?DateTimeInterface
    {
        return $this->pillTakenDate;
    }

    public function setPillTakenDate(?DateTimeInterface $pillTakenDate): self
    {
        $this->pillTakenDate = $pillTakenDate;

        return $this;
    }

    public function getMetforminTaken(): ?bool
    {
        return $this->metforminTaken;
    }

    public function setMetforminTaken(?bool $metforminTaken): self
    {
        $this->metforminTaken = $metforminTaken;

        return $this;
    }

    public function getDiaplexTaken(): ?bool
    {
        return $this->diaplexTaken;
    }

    public function setDiaplexTaken(?bool $diaplexTaken): self
    {
        $this->diaplexTaken = $diaplexTaken;

        return $this;
    }

    public function getMultivitaminTaken(): ?bool
    {
        return $this->multivitaminTaken;
    }

    public function setMultivitaminTaken(?bool $multivitaminTaken): self
    {
        $this->multivitaminTaken = $multivitaminTaken;

        return $this;
    }

    public function getVitaminDTaken(): ?bool
    {
        return $this->vitaminDTaken;
    }

    public function setVitaminDTaken(?bool $vitaminDTaken): self
    {
        $this->vitaminDTaken = $vitaminDTaken;

        return $this;
    }

    public function getB12Taken(): ?bool
    {
        return $this->b12Taken;
    }

    public function setB12Taken(?bool $b12Taken): self
    {
        $this->b12Taken = $b12Taken;

        return $this;
    }

    public function getB12ComplexTaken(): ?bool
    {
        return $this->b12ComplexTaken;
    }

    public function setB12ComplexTaken(?bool $b12ComplexTaken): self
    {
        $this->b12ComplexTaken = $b12ComplexTaken;

        return $this;
    }

}
