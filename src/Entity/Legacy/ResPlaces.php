<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'res_places')]
class ResPlaces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'place_name')]
    private ?string $placeName = null;

    #[ORM\Column(type: 'string', length: 1500, nullable: true, name: 'google_link')]
    private ?string $googleLink = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'category_id')]
    private ?int $categoryId = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'close_easy')]
    private ?bool $closeEasy = null;

    #[ORM\Column(type: 'boolean', nullable: true, name: 'sol_likes')]
    private ?bool $solLikes = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'alex_likes')]
    private ?int $alexLikes = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPlaceName(): ?string
    {
        return $this->placeName;
    }

    public function setPlaceName(?string $placeName): self
    {
        $this->placeName = $placeName;

        return $this;
    }

    public function getGoogleLink(): ?string
    {
        return $this->googleLink;
    }

    public function setGoogleLink(?string $googleLink): self
    {
        $this->googleLink = $googleLink;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getCloseEasy(): ?bool
    {
        return $this->closeEasy;
    }

    public function setCloseEasy(?bool $closeEasy): self
    {
        $this->closeEasy = $closeEasy;

        return $this;
    }

    public function getSolLikes(): ?bool
    {
        return $this->solLikes;
    }

    public function setSolLikes(?bool $solLikes): self
    {
        $this->solLikes = $solLikes;

        return $this;
    }

    public function getAlexLikes(): ?int
    {
        return $this->alexLikes;
    }

    public function setAlexLikes(?int $alexLikes): self
    {
        $this->alexLikes = $alexLikes;

        return $this;
    }

}
