<?php

namespace App\Interfaces;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Collection;

interface categoriRepositoryInterface
{

     public function all();
     public function find($categorie);
     public function create(array $data);
     public function update($categorie ,array $data);
     public function delete(Categorie $categorie);
}
