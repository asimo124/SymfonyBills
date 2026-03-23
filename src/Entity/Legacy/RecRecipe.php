<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'rec_recipe')]
class RecRecipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, name: 'recipe_name')]
    private string $recipeName;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'image_path')]
    private ?string $imagePath = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getRecipeName(): string
    {
        return $this->recipeName;
    }

    public function setRecipeName(string $recipeName): self
    {
        $this->recipeName = $recipeName;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): self
    {
        $this->imagePath = $imagePath;

        return $this;
    }

}
