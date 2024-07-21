<?php

namespace App\Interfaces;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Collection;

interface categoriRepositoryInterface
{
    public function all(): Collection;
    public function find(Categorie $categorie);
    public function create(array $data);
    public function update(Categorie $categorie, array $data);
    public function delete(Categorie $categorie);

}
