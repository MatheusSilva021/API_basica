<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_sizes extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['Size'];
}
