<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\products_variation_color; // use for get all color list
use App\Models\ProductVariationColor;

class ProductVariationColorController extends Controller
{

    // Get all color
    function allColorList()
    {
        // This function will return all color list with a array (Not Follow Hierarchy)
        return ProductVariationColor::all();
    }

    // Get color details by id
    function colorDetailsById($id)
    {
        // This function will return color inforemation with a array limit 1
        $color = ProductVariationColor::where("id", $id)->get();
        return $color[0];
    }

    // Get color details by color id
    function getColorDetailsById($id)
    {
        // This function will return color inforemation with a array limit 1
        $color = ProductVariationColor::where("id", $id)->get()->first();
        return $color;
    }

    // This function will add new color in database
    function addNewColor(Request $request)
    {
        // Check user is not authorized or not
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            $createStatus = ProductVariationColor::create([
                'color_name' => $request["colorName"],
                'color_code' => $request["colorCode"]
            ]);
            return redirect("/color/manage-color");
        } else {
            // User not authorized
            return "you are not authorized";
        }
    }

    // This function will edit color details
    function editColor(Request $request)
    {
        // Check user is not authorized or not
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            $updateStatus = ProductVariationColor::where("id", $request["id"])->update([
                'color_name' => $request["colorName"],
                'color_code' => $request["colorCode"]
            ]);
            return redirect("/color/manage-color");
        } else {
            // User not authorized
            return "you are not authorized";
        }
    }

    // This function will delete a color from database
    function deleteSingleColor(Request $request)
    {
        $colorId = $request["colorId"];
        // Check user is not authorized or not
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            $deleteStatus = ProductVariationColor::where("id", $colorId)->delete();
            return $deleteStatus;
        } else {
            // User not authorized
            return "you are not authorized";
        }
    }
}
