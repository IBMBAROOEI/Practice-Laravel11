<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];

    // protected $with=['categorie','tags'];

    Protected $fillable=['name','price','discription'];



    public function categorie():BelongsToMany{


        return $this->belongsToMany(Categorie::class,'product_categorie','product_id','categorie_id');
    }

    public function tags():BelongsToMany{


        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id');
    }
}
