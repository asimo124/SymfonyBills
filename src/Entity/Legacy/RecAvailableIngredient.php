<?php

namespace App\Entity\Legacy;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'rec_available_ingredient')]
class RecAvailableIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer', name: 'ingredient_id')]
    private int $ingredientId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIngredientId(): int
    {
        return $this->ingredientId;
    }

    public function setIngredientId(int $ingredientId): self
    {
        $this->ingredientId = $ingredientId;

        return $this;
    }

}
