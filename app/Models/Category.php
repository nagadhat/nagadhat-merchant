<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'title',
        'description',
        'logo',
        'banner_image',
        'parent_id',
        'slug',
        'status'
    ];

    public $timestamps = true;

}
