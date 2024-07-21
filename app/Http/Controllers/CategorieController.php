<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Trait\ApiResponse;
use Illuminate\Http\Response;

use App\Interfaces\categoriRepositoryInterface;

class CategorieController extends Controller
{


    Use ApiResponse;

    public function __construct(private categoriRepositoryInterface $categoriRepositoryInterface )
    {
       $this->categoriRepositoryInterface= $categoriRepositoryInterface;
    }



     public function store(Request $request){
        $product=$this->categoriRepositoryInterface->create($request->all());
        return $this->handleStatusCodes(Response::HTTP_CREATED,  new ProductResource($product));
     }





     public function update(Request $request,$id){

        $product=$this->productRepositoryInterface->update($id,$request->all());
        return $this->handleStatusCodes(Response::HTTP_OK,  new ProductResource($product));
     }



      public function index(){


        $products=$this->productRepositoryInterface->all();

        return $this->handleStatusCodes(Response::HTTP_OK,
        ProductResource::collection($products));
      }


      public function find($id){


        $products=$this->productRepositoryInterface->find($id);

        return $this->handleStatusCodes(Response::HTTP_OK,
         new ProductResource($products));
      }


      public function delete(Product $product){


        if($this->productRepositoryInterface->delete($product)){
            return $this->handleStatusCodes(Response::HTTP_NO_CONTENT);
        }
        else{

        return $this->handleStatusCodes(Response::HTTP_NOT_FOUND);

      }
    }
}
