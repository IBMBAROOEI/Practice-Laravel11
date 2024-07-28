<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{

     public function all():Collection;
     public function find(Product $product):?Product;
     public function create(array $data):Product;
     public function update(Product $product,array $data):Product;
     public function delete(Product $product):bool;

     public function attachCategories(Product $product, array $categorie_id):void;

     public function syncCategories(Product $product,array $categorie_id):void;
}

