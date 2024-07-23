<?php

namespace App\Repository;

use App\Interfaces\CategoriRepositoryInterface;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Collection;

class CategorieRepository implements CategoriRepositoryInterface
{
    public function all(): Collection
    {
        return Categorie::all();
    }

    public function find(Categorie $categorie): ?Categorie
    {

        return $categorie;
    }

    public function create(array $data): Categorie
    {
        return Categorie::create($data);
    }

    public function update(Categorie $categorie, array $data): Categorie
{
    $categorie->update($data);
    return $categorie;
}

    public function delete(Categorie $categorie): bool
    {
        return $categorie->delete();
    }
}
