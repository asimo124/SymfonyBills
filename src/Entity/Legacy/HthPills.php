<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'hth_pills')]
class HthPills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', nullable: true, name: 'date_taken')]
    private ?DateTimeInterface $dateTaken = null;

    #[ORM\Column(type: 'boolean', name: 'probiotic_taken')]
    private bool $probioticTaken;

    #[ORM\Column(type: 'integer', nullable: true, name: 'time_taken_id')]
    private ?int $timeTakenId = null;

    #[ORM\Column(type: 'boolean', name: 'supplements_taken')]
    private bool $supplementsTaken;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $entrydate = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getDateTaken(): ?DateTimeInterface
    {
        return $this->dateTaken;
    }

    public function setDateTaken(?DateTimeInterface $dateTaken): self
    {
        $this->dateTaken = $dateTaken;

        return $this;
    }

    public function getProbioticTaken(): bool
    {
        return $this->probioticTaken;
    }

    public function setProbioticTaken(bool $probioticTaken): self
    {
        $this->probioticTaken = $probioticTaken;

        return $this;
    }

    public function getTimeTakenId(): ?int
    {
        return $this->timeTakenId;
    }

    public function setTimeTakenId(?int $timeTakenId): self
    {
        $this->timeTakenId = $timeTakenId;

        return $this;
    }

    public function getSupplementsTaken(): bool
    {
        return $this->supplementsTaken;
    }

    public function setSupplementsTaken(bool $supplementsTaken): self
    {
        $this->supplementsTaken = $supplementsTaken;

        return $this;
    }

    public function getEntrydate(): ?DateTimeInterface
    {
        return $this->entrydate;
    }

    public function setEntrydate(?DateTimeInterface $entrydate): self
    {
        $this->entrydate = $entrydate;

        return $this;
    }

}
