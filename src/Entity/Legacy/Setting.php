<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'setting')]
class Setting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, name: 'setting_key_name')]
    private string $settingKeyName;

    #[ORM\Column(type: 'string', length: 1500, nullable: true, name: 'setting_value')]
    private ?string $settingValue = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getSettingKeyName(): string
    {
        return $this->settingKeyName;
    }

    public function setSettingKeyName(string $settingKeyName): self
    {
        $this->settingKeyName = $settingKeyName;

        return $this;
    }

    public function getSettingValue(): ?string
    {
        return $this->settingValue;
    }

    public function setSettingValue(?string $settingValue): self
    {
        $this->settingValue = $settingValue;

        return $this;
    }

}
