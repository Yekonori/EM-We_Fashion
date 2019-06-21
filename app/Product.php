<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'description',
        'price',
        'size',
        'picture',
        'visibility',
        'status',
        'reference',
        'categorie_id'
    ];

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function scopePublished($query) {
        // return products where the visibility is published
        return $query->where('visibility', 'published');
    }

    public function scopeSales($query) {
        // return products where the status is sale
        return $query->where('status', 'sale');
    }

    public function scopeCategorie($query, $id) {
        // return products where the categorie_id is the specific id
        return $query->where('categorie_id', $id);
    }
}
