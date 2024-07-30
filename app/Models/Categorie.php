<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Categorie extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    Protected $fillable=['id','name','parent_id'];



    public function parent():BelongsTo{
        return $this->belongsTo(Categorie::class,'parent_id');
    }


    public function child():HasMany{
        return $this->hasMany(Categorie::class,'parent_id');
    }


    public function products():BelongsToMany{


        return $this->belongsToMany(Product::class,'product_categorie','categorie_id','product_id');
    }

}
