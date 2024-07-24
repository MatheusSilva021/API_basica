<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function productCategories()
    {
        return $this->hasMany(product_category::class);
    }

    public function productSizes()
    {
        return $this->hasMany(product_sizes::class);
    }
    
    public function productImages()
    {
        return $this->hasMany(product_images::class);
    }
}
