<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'p2p_settings')]
class P2pSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'attribute_key')]
    private ?string $attributeKey = null;

    #[ORM\Column(type: 'string', length: 3000, nullable: true, name: 'attribute_value')]
    private ?string $attributeValue = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAttributeKey(): ?string
    {
        return $this->attributeKey;
    }

    public function setAttributeKey(?string $attributeKey): self
    {
        $this->attributeKey = $attributeKey;

        return $this;
    }

    public function getAttributeValue(): ?string
    {
        return $this->attributeValue;
    }

    public function setAttributeValue(?string $attributeValue): self
    {
        $this->attributeValue = $attributeValue;

        return $this;
    }

}
