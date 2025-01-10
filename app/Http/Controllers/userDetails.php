<?php
// This controller will care about collecting user information
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_admin; // Use for User_admin model
use App\Models\vendor; // Use for vendor

class userDetails extends Controller
{
    function getVendorUserDetails($id)
    {
        //This function will return user infromation from User_admins table
        $userData = vendor::where("id", $id)->first();
        // Get Desire details about user
        return $userData;
    }
}
