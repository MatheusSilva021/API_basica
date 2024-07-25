<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'product_ID';

    public function productCategories()
    {
        return $this->belongsToMany(Categories::class, 'product_categories','product_ID','category_ID');
    }

    public function productSizes()
    {
        return $this->belongsToMany(sizes::class,'product_Sizes', 'product_ID','size_ID');
    }

    public function productImages()
    {
        return $this->hasMany(product_images::class,'product_ID');
    }
}
