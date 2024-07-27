<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    use HasFactory;

    Protected $fillable=['id','name','parent_id'];


    public function products():BelongsToMany{


        return $this->belongsToMany(Product::class);
    }

}
