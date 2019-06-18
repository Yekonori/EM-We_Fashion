<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function scopePublished($query) {
        return $query->where('visibility', 'published');
    }

    public function scopeSales($query) {
        return $query->where('status', 'sale');
    }

    public function scopeCategorie($query, $id) {
        return $query->where('categorie_id', $id);
    }
}
