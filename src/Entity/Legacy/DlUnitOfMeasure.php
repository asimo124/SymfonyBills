<?php

namespace App\Entity\Legacy;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'dl_unit_of_measure')]
class DlUnitOfMeasure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    /** @var Collection<int, DlFood> */
    #[ORM\OneToMany(targetEntity: DlFood::class, mappedBy: 'unitOfMeasure')]
    private Collection $foods;

    public function __construct()
    {
        $this->foods = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, DlFood>
     */
    public function getFoods(): Collection
    {
        return $this->foods;
    }
}

