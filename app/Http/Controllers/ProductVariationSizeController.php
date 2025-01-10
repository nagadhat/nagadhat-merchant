<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\products_variation_size; // use for get all size list
use App\Models\ProductVariationSize;

class ProductVariationSizeController extends Controller
{

    //get all size
    function allSizeList()
    {
        // This function will return all size list with a array (Not Follow Hierarchy)
        return ProductVariationSize::all();
    }

    // Get size details by id
    function sizeDetailsById($id)
    {
        // This function will return size inforemation with a array limit 1
        $size = ProductVariationSize::where("id", $id)->get();
        return $size[0];
    }
    // Get size details by id
    function getSizeDetailsById($id)
    {
        // This function will return size inforemation with a array limit 1
        $size = ProductVariationSize::where("id", $id)->get()->first();
        return $size;
    }

    // This function will add new size to database
    function addNewSize(Request $request)
    {
        // Check user is not authorized or not
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            $createStatus = ProductVariationSize::create([
                'size_name' => $request["sizeName"],
                'size_code' => $request["sizeCode"]
            ]);
            return redirect("/size/manage-size");
        } else {
            // User not authorized
            return "you are not authorized";
        }
    }
    // This function will edit size details
    function editSize(Request $request)
    {
        // Check user is not authorized or not
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            $updateStatus = ProductVariationSize::where("id", $request["id"])->update([
                'size_name' => $request["sizeName"],
                'size_code' => $request["sizeCode"]
            ]);
            return redirect("/size/manage-size");
        } else {
            // User not authorized
            return "you are not authorized";
        }
    }
    // This function will delte single size details from database
    function deleteSingleSize(Request $request)
    {
        $sizeId = $request["sizeId"];
        // Check user is not authorized or not
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            $deleteStatus = ProductVariationSize::where("id", $sizeId)->delete();
            return $deleteStatus;
        } else {
            // User not authorized
            return "you are not authorized";
        }
    }
}
