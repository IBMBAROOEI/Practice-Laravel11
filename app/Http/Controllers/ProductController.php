<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Trait\ApiResponse;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Dumpable;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use Symfony\Component\Console\Helper\Dumper;

class ProductController extends Controller
{

    use ApiResponse ,Conditionable, Dumpable;

     public function __construct(private ProductRepositoryInterface $productRepositoryInterface )
     {
        $this->productRepositoryInterface= $productRepositoryInterface;
     }


     public function store(ProductRequest $request){


        dump($request->all());
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


      public function delete(Product $product){


        if($this->productRepositoryInterface->delete($product)){
            return $this->handleStatusCodes(Response::HTTP_NO_CONTENT);
        }
        else{

        return $this->handleStatusCodes(Response::HTTP_NOT_FOUND);

      }
    }
}
