<?php


namespace  App\Repository;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface


{

public function all():Collection{



     return Product::query()->get();
}

public function find(int $id):?Product{

    return Product::find($id);
}


public function create(array $data):Product{


    return Product::create($data);
}

public function update(int $id, array $data):?Product{

    $pro=$this->find($id);

    if($pro){
    $pro->update($data);

    return $pro;
    }
    return null;

}

public function delete(Product $product):bool{

    $pro=$product->delete();

    if($pro){
        return $pro;
    }
    return false;

}
}
