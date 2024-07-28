<?php


namespace  App\Repository;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface


{

public function all():Collection{



     return Product::query()->with('categorie')->get();
}

public function find(Product $product):?Product{

    return $product;
}


public function create(array $data):Product{

    return Product::create($data);
}

public function update(Product $product, array $data):Product{

    $product->update($data);
    return $product;

}

public function delete(Product $product):bool{


     return $product->delete();

}

public function attachCategories(Product $product, array $categorie_id): void

{


    $product->categorie()->attach($categorie_id);
}


public function syncCategories(Product $product, array $categorie_id): void
{
    $product->categorie()->sync($categorie_id);
}
}
