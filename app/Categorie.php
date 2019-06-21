<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // The attributes that are mass assignable
    protected $fillable = [ 'categorie' ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
