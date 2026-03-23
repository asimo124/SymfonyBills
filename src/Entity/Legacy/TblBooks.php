<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'tbl_books')]
class TblBooks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $bookname = null;

    #[ORM\Column(type: 'string', length: 3000, nullable: true)]
    private ?string $desc = null;

    #[ORM\Column(type: 'integer', nullable: true, name: 'category_id')]
    private ?int $categoryId = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBookname(): ?string
    {
        return $this->bookname;
    }

    public function setBookname(?string $bookname): self
    {
        $this->bookname = $bookname;

        return $this;
    }

    public function getDesc(): ?string
    {
        return $this->desc;
    }

    public function setDesc(?string $desc): self
    {
        $this->desc = $desc;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

}
