<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }
}
