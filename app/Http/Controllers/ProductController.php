<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Trait\ApiResponse;
use App\Models\Product;

class ProductController extends Controller
{

    use ApiResponse;

     public function __construct(private ProductRepositoryInterface $productRepositoryInterface )
     {
        $this->productRepositoryInterface= $productRepositoryInterface;
     }


     public function store(Request $request){
        $product=$this->productRepositoryInterface->create($request->all());
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


      public function delete($id){


        if($this->productRepositoryInterface->delete($id)){
            return $this->handleStatusCodes(Response::HTTP_NO_CONTENT);
        }
        else{

        return $this->handleStatusCodes(Response::HTTP_NOT_FOUND);

      }
    }
}
