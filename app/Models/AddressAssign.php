<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressAssign extends Model
{
    use HasFactory;

    protected $table = 'address_assign';

    protected $timestaps = true;

    protected $fillable = [
        'username',
        'user_id',
        'address_id'
    ];
}
