<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $table = "products_variations";

    protected $fillable = [
        "product_id",
        "size_id",
        "color_id",
        "quantity",
        "price",
        "size_name",
        "color_name",
        "color_code"
    ];

    public $timestamps = false;
}
