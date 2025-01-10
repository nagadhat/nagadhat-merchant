<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationColor extends Model
{
    use HasFactory;

    protected $table = "products_variation_colors";

    protected $fillable = [
        'id',
        'color_name',
        'color_code'
    ];

    public $timestamps = false;
}
