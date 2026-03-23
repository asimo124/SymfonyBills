<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'hth_bm_preventative_methods')]
class HthBmPreventativeMethods
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', nullable: true, name: 'date_taken')]
    private ?DateTimeInterface $dateTaken = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'method_type')]
    private ?string $methodType = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'time_taken')]
    private ?string $timeTaken = null;

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

    public function getMethodType(): ?string
    {
        return $this->methodType;
    }

    public function setMethodType(?string $methodType): self
    {
        $this->methodType = $methodType;

        return $this;
    }

    public function getTimeTaken(): ?string
    {
        return $this->timeTaken;
    }

    public function setTimeTaken(?string $timeTaken): self
    {
        $this->timeTaken = $timeTaken;

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
