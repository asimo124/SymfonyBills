<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ah1_properties')]
class Ah1Properties
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true, name: 'mls_Id')]
    private ?string $mlsId = null;

    #[ORM\Column(type: 'string', length: 300, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(type: 'string', length: 75, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private ?string $state = null;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private ?string $zip = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'user_id')]
    private ?int $userId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMlsId(): ?string
    {
        return $this->mlsId;
    }

    public function setMlsId(?string $mlsId): self
    {
        $this->mlsId = $mlsId;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

}
