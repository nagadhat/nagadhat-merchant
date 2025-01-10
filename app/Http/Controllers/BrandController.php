<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\imagesHandler;

class BrandController extends Controller {

    // Get all categories list
    function allBrandList() {
        $allBrandList = Brand::all();
        return $allBrandList;
    }

    // This function will add new brand to database
    function addNewBrand(Request $request) {
        // Crose check user have this permission or not
        if (auth()->user()->user_type == "admin") {
            // User Authorize
            // upload Image first
            $imgHandeler = new imagesHandler();

            $logo = ($request->hasFile("logo")) ? $imgHandeler->uploadAndGetPath($request->file("logo"), "/public/media/brands") : null;
            $banner = ($request->hasFile("banner")) ? $imgHandeler->uploadAndGetPath($request->file("banner"), "/public/media/brands") : null;
            $addNewBrand = Brand::create([
                        'title' => $request["brandName"],
                        'status' => $request["activeStatus"],
                        'description' => $request["description"],
                        'slug' => uniqid(),
                        'logo' => $logo,
                        'banner' => $banner
            ]);
            return redirect("/brand/manage-brand");
        } else {
            // User is not authorize
            return "You are not authorized";
        }
    }

    // This function will delete brand from database and return 1 if successfully delete, 0 for unsuccess
    function deleteSingleBrand(Request $request) {
        // Crose check user have this permission or not
        if (auth()->user()->user_type == "admin") {
            // User Authorize
            $res = Brand::find($request["brandId"])->delete();
            return $res;
        } else {
            // User is not authorize
            return 0;
        }
    }

    // This function will return all value based on slug
    function getBrandDetailsBySlug($slug) {
        $brand = Brand::where("slug", $slug)->get()->first();
        return $brand;
    }

    // This function will show edit page of brand
    function showEditBranView(Request $request) {
        $brandSlug = $request["slug"];
        $brandDetails = $this->getBrandDetailsBySlug($brandSlug);
        return view("brand.edit-brand", ["brandDetails" => $brandDetails]);
    }

    // This function will edit brand details and save to database
    function editBrandDetais(Request $request) {
        $slug = $request["slug"];
        // Crose check user is authorized or not for this operation
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User Authorized
            $brandDetails = Brand::where("slug",$slug)->get()->first();
            if($brandDetails == null){
                // Brand found to edit
                return "Brand not Found";
            }
            $imgHandeler = new imagesHandler();
            $logo = ($request->hasFile("logo")) ? $imgHandeler->uploadAndGetPath($request->file("logo"), "/public/media/brands") : $brandDetails["logo"];
            $banner = ($request->hasFile("banner")) ? $imgHandeler->uploadAndGetPath($request->file("banner"), "/public/media/brands") : $brandDetails["banner"];
            $updateResult = brand::where("slug", $slug)->update([
                "title" => $request["brandName"],
                "status" => $request["activeStatus"],
                "description" => $request["description"],
                "logo" => $logo,
                "banner" => $banner,
            ]);
            return redirect("/brand/manage-brand");
        } else {
            // User not authorized
            return "You have no permition to do this.";
        }
    }

}
