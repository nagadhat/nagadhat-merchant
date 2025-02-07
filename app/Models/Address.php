<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $timestaps = true;

    protected $fillable = [
        'address_1',
        'postal_code',
        'city',
        'country',
        'contact_number',
        'area'
    ];

}
