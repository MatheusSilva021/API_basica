<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sizes extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['Size','Abbreviation'];
    protected $primaryKey = 'size_ID';

    public function products()
    {
        $this->belongsToMany(Products::class,'product_categories', 'size_ID', 'product_ID');
    }
}
