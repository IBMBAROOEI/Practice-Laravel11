<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategorieResource;
use Illuminate\Http\Request;
use App\Http\Trait\ApiResponse;
use Illuminate\Http\Response;

use App\Interfaces\CategoriRepositoryInterface;
use App\Models\Categorie;

class CategorieController extends Controller
{


    Use ApiResponse;

    public function __construct(private CategoriRepositoryInterface $categoriRepositoryInterface )
    {
       $this->categoriRepositoryInterface= $categoriRepositoryInterface;
    }



     public function store(Request $request){

        $categori=$this->categoriRepositoryInterface->create($request->all());
        return $this->handleStatusCodes(Response::HTTP_CREATED,  new CategorieResource($categori));
     }





   // در متد update
public function update(Request $request, Categorie $categorie)
{
    $c = $this->categoriRepositoryInterface->update($categorie, $request->all());
    return $this->handleStatusCodes(Response::HTTP_OK, new CategorieResource($c));
}

      public function index(){


        $categori=$this->categoriRepositoryInterface->all();

        return $this->handleStatusCodes(Response::HTTP_OK,
        CategorieResource::collection($categori));
      }




      public function find(Categorie $categorie)
      {
          if ($categorie) {
              return $this->handleStatusCodes(Response::HTTP_OK, new CategorieResource($categorie));
          } else {
              return $this->handleStatusCodes(Response::HTTP_NOT_FOUND);
          }
      }



      public function delete(Categorie $categorie)
      {
          $this->categoriRepositoryInterface->delete($categorie);
          return $this->handleStatusCodes(Response::HTTP_NO_CONTENT);
      }




}
