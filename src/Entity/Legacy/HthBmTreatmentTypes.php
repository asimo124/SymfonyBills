<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'hth_ bm_treatment_types')]
class HthBmTreatmentTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'treatment_type')]
    private ?string $treatmentType = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTreatmentType(): ?string
    {
        return $this->treatmentType;
    }

    public function setTreatmentType(?string $treatmentType): self
    {
        $this->treatmentType = $treatmentType;

        return $this;
    }

}
