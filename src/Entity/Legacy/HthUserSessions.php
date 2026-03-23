<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

#[ORM\Entity]
#[ORM\Table(name: 'hth_user_sessions')]
class HthUserSessions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'session_key')]
    private ?string $sessionKey = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'user_id')]
    private ?int $userId = null;

    #[ORM\Column(type: 'datetime', nullable: true, name: 'last_until')]
    private ?DateTimeInterface $lastUntil = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getSessionKey(): ?string
    {
        return $this->sessionKey;
    }

    public function setSessionKey(?string $sessionKey): self
    {
        $this->sessionKey = $sessionKey;

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

    public function getLastUntil(): ?DateTimeInterface
    {
        return $this->lastUntil;
    }

    public function setLastUntil(?DateTimeInterface $lastUntil): self
    {
        $this->lastUntil = $lastUntil;

        return $this;
    }

}
