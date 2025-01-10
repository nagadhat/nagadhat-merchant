<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\products_variation;
use App\Models\ProductVariation;

class ProductVariationController extends Controller
{
    //Insert data to product_variations table using product_variation model and finally return the id
    function insertAndReturnId($data){
        $id = ProductVariation::create([
            "product_id" => $data["product_id"],
            "size_id" => $data["size_id"],
            "color_id" => $data["color_id"],
            "quantity" => $data["quantity"],
            "price" => $data["price"],
            "size_name" => $data["size_name"],
            "color_name" => $data["color_name"],
            "color_code" => $data["color_code"],
        ]);
        return $id;
    }
    // This function will return product variation by product id
    function getProductVariationListById($id) {
        $productVariation = ProductVariation::where("product_id",$id)->get(); // Get all variation by product id
        return $productVariation;
    }
}
