<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationSize extends Model
{
    use HasFactory;

    protected $table = "products_variation_sizes";

    protected $fillable = [
        'size_name',
        'size_code'
    ];

    public $timestamps = false;
}
