<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'hth_bm')]
class HthBm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'date', nullable: true, name: 'date_taken')]
    private ?DateTimeInterface $dateTaken = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'time_taken_id')]
    private ?int $timeTakenId = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'pain_level_id')]
    private ?int $painLevelId = null;

    #[ORM\Column(type: 'boolean', name: 'does_float')]
    private bool $doesFloat;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $texture = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTimeInterface $entrydate = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'solid_loose')]
    private ?string $solidLoose = null;

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

    public function getTimeTakenId(): ?int
    {
        return $this->timeTakenId;
    }

    public function setTimeTakenId(?int $timeTakenId): self
    {
        $this->timeTakenId = $timeTakenId;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPainLevelId(): ?int
    {
        return $this->painLevelId;
    }

    public function setPainLevelId(?int $painLevelId): self
    {
        $this->painLevelId = $painLevelId;

        return $this;
    }

    public function getDoesFloat(): bool
    {
        return $this->doesFloat;
    }

    public function setDoesFloat(bool $doesFloat): self
    {
        $this->doesFloat = $doesFloat;

        return $this;
    }

    public function getTexture(): ?string
    {
        return $this->texture;
    }

    public function setTexture(?string $texture): self
    {
        $this->texture = $texture;

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

    public function getSolidLoose(): ?string
    {
        return $this->solidLoose;
    }

    public function setSolidLoose(?string $solidLoose): self
    {
        $this->solidLoose = $solidLoose;

        return $this;
    }

}
