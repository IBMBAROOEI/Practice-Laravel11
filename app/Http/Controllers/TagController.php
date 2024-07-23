<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Trait\ApiResponse;
use App\Http\Resources\TagResource;

use App\Interfaces\TagRepositoryInterface;

class TagController extends Controller
{


    Use ApiResponse;

    public function __construct(private TagRepositoryInterface $tagRepositoryInterface )
    {
       $this->tagRepositoryInterface= $tagRepositoryInterface;
    }



     public function store(Request $request){

        $categori=$this->tagRepositoryInterface->create($request->all());
        return $this->handleStatusCodes(Response::HTTP_CREATED,  new TagResource($categori));
     }


public function update(Tag $tag,Request $request)
{
    $c = $this->tagRepositoryInterface->update($tag,$request->all());
    return $this->handleStatusCodes(Response::HTTP_OK, new TagResource($c));
}

      public function index(){


        $categori=$this->tagRepositoryInterface->all();

        return $this->handleStatusCodes(Response::HTTP_OK,
        TagResource::collection($categori));
      }




      public function find(Tag $Tag)
      {
          if ($Tag) {
              return $this->handleStatusCodes(Response::HTTP_OK, new TagResource($Tag));
          } else {
              return $this->handleStatusCodes(Response::HTTP_NOT_FOUND);
          }
      }



      public function delete(Tag $tag)
      {
          $this->tagRepositoryInterface->delete($tag);
          return $this->handleStatusCodes(Response::HTTP_NO_CONTENT);
      }


}
