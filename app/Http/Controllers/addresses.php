<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address_assign; // Use for address assign table
use App\Models\address; // Use for address

class addresses extends Controller
{
    // this function will return full address if found or it will return null if not found
    function fullAddressByAssignId($addressAssignId){
        $addressId = address_assign::where("id",$addressAssignId)->get()->first();
        if($addressId != null){
            $address = address::where("id",$addressId["address_id"])->get()->first();
        }else{
            $address = null;
        }
        return $address;
    }
}
