<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'fs_food_history')]
class FsFoodHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, name: 'ref_table')]
    private string $refTable;

    #[ORM\Column(type: 'integer', name: 'ref_table_id')]
    private int $refTableId;

    #[ORM\Column(type: 'date', name: 'consumed_date')]
    private DateTimeInterface $consumedDate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getRefTable(): string
    {
        return $this->refTable;
    }

    public function setRefTable(string $refTable): self
    {
        $this->refTable = $refTable;

        return $this;
    }

    public function getRefTableId(): int
    {
        return $this->refTableId;
    }

    public function setRefTableId(int $refTableId): self
    {
        $this->refTableId = $refTableId;

        return $this;
    }

    public function getConsumedDate(): DateTimeInterface
    {
        return $this->consumedDate;
    }

    public function setConsumedDate(DateTimeInterface $consumedDate): self
    {
        $this->consumedDate = $consumedDate;

        return $this;
    }

}
