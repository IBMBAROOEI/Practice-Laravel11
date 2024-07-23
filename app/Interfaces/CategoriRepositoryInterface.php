<?php

namespace App\Interfaces;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Collection;

interface CategoriRepositoryInterface
{
    public function all(): Collection;
    public function find(Categorie $categorie): ?Categorie;
    public function create(array $data): Categorie;
    public function update(Categorie $categorie,array $data,): Categorie;
    public function delete(Categorie $categorie): bool;

}


