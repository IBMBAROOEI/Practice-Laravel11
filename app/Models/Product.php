<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];


    Protected $fillable=['name','price','discription'];



    public function categorie():BelongsToMany{


        return $this->belongsToMany(Categorie::class,'product_categorie','product_id','categorie_id');
    }
}
