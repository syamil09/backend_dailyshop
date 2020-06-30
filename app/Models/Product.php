<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Product extends Model
{
    use Softdeletes; 

    protected $fillable = [
    	'name', 'type', 'description', 'price', 'slug', 'quantity'
    ];

    public function galleries()
    {
    	return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
