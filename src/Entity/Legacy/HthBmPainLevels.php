<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'hth_bm_pain_levels')]
class HthBmPainLevels
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'pain_level')]
    private ?string $painLevel = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPainLevel(): ?string
    {
        return $this->painLevel;
    }

    public function setPainLevel(?string $painLevel): self
    {
        $this->painLevel = $painLevel;

        return $this;
    }

}
