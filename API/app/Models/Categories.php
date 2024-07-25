<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['category_Name'];
    protected $primaryKey = 'category_ID';

    public function products()
    {
        return $this->belongsToMany(Products::class, 'product_categories', 'category_ID', 'product_ID');
    }
}
