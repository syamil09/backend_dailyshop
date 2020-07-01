<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class ProductGallery extends Model
{
    use Softdeletes;

    protected $fillable = [
    	'product_id', 'photo', 'is_default'
    ];

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/'. $value);
    }
}
