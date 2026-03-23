<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'glu_log_notes')]
class GluLogNotes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', nullable: true, name: 'log_id')]
    private ?int $logId = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'date_entered')]
    private ?DateTimeInterface $dateEntered = null;

    #[ORM\Column(type: 'string', length: 5000, nullable: true)]
    private ?string $note = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLogId(): ?int
    {
        return $this->logId;
    }

    public function setLogId(?int $logId): self
    {
        $this->logId = $logId;

        return $this;
    }

    public function getDateEntered(): ?DateTimeInterface
    {
        return $this->dateEntered;
    }

    public function setDateEntered(?DateTimeInterface $dateEntered): self
    {
        $this->dateEntered = $dateEntered;

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

}
