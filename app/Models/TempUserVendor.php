<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempUserVendor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "temp_user_vendors";

    protected $fillable = [
        "email",
        "phone",
        "users_name",
        "shop_type",
        "shop_name",
        "location",
        "password",
        "otp",
    ];

}
