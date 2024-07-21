<?php


namespace  App\Repository;

use App\Interfaces\categoriRepositoryInterface;

use App\Models\Categorie;

use Illuminate\Database\Eloquent\Collection;

class CategorieRepository  implements categoriRepositoryInterface


{

public function all():Collection{


     return Categorie::query()->get();
}

public function find(Categorie $categorie){

    return $categorie;
}


public function create(array $data){


    return Categorie::create($data);
}

public function update(Categorie $categorie, array $data){

    $pro=$this->find($categorie);

    if($pro){
    $pro->update($data);

    return $pro;
    }
    return null;

}

public function delete(Categorie $categorie){

     $categorie->deleteOrFail();

     return true;

}
}
