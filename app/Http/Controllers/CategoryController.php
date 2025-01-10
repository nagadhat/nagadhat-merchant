<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\products_categorie; // Use for collecting product categories

class CategoryController extends Controller
{

    // Get all categories
    public function allCategoriesList()
    {
        dd('sdlksl');
        // This function will return all categories list with a array (Not Follow Hierarchy)
        $parents_categories = Category::all();
        return $parents_categories;
    }

    // This function will return product categories by product id
    public function getProductCategoriesListById($id)
    {
        $categoriesByProduct = ProductCategory::join("categories", "categories.id", "=", "products_categories.category_id")->where("products_categories.product_id", $id)->get(); // Get all categories by product id
        // Only categories id will store this array
        $categoriesId = array();
        foreach ($categoriesByProduct as $category) {
            $categoriesId[] = $category["category_id"];
        }
        $categoriesByProduct->onlyCategoriesId = $categoriesId;
        return $categoriesByProduct;
    }
    // This function will return category information by category slug
    public function getCategoryDetailsBySlug($slug)
    {
        $categoryDetails = Category::where("slug", $slug)->get()->first();
        return $categoryDetails;
    }

    // This function will add a new category
    public function addNewCategory(Request $request)
    {
        if (auth()->user()->user_type == "admin") {
            // upload image first and get path
            $imgController = new imagesHandler();
            $logo = ($request->hasFile("logo")) ? $imgController->uploadAndGetPath($request->file("logo"), "/public/media/categories") : null;
            $banner = ($request->hasFile("banner")) ? $imgController->uploadAndGetPath($request->file("banner"), "/public/media/categories") : null;
            $addNewCategory = Category::create([
                'title' => $request["categoryName"],
                'description' => $request["description"],
                'logo' => $logo,
                'banner_image' => $banner,
                'slug' => uniqid(),
                'status' => $request["activeStatus"],
                'parent_id' => 0
            ]);
            return redirect("/dashboard/categories/manage-categories");
        } else {
            return redirect("/dashboard/categories/manage-categories");
        }
    }

    // This function will delete single categories by Id
    public function deleteSingleCategorie(Request $request)
    {
        // Crose check user is authorized or not for this operation
        if (auth()->user()->user_type == "admin") {
            // User is authorized
            $deleteStatus = Category::find($request["categoryId"])->delete();
            return 1;
        } else {
            // User is not authorized
            return 0;
        }
    }
    // This function will edit categorie details
    public function editCategory(Request $request)
    {
        $slug = $request["slug"];
        // Crose check user have this permition or not (Authorized or not)
        if (auth()->user() && auth()->user()->user_type == "admin") {
            // User authorized
            // Category is exist or not
            $categoryDetails = Category::where("slug", $slug)->get()->first();
            $imgController = new imagesHandler();
            if ($categoryDetails != null) {
                // Categories found
                $logo = ($request->hasFile("logo")) ? $imgController->uploadAndGetPath($request->file("logo")) : $categoryDetails["logo"];
                $banner = ($request->hasFile("banner_images")) ? $imgController->uploadAndGetPath($request->file("banner_images")) : $categoryDetails["banner_image"];
                $editResult = Category::where("id", $categoryDetails["id"])->update([
                    "title" => $request["categoryName"],
                    "description" => $request["description"],
                    "status" => $request["activeStatus"],
                    "logo" => $logo,
                    "banner_image" => $banner,
                ]);
            } else {
                // Categories not found
                return "Category not found.";
            }
        } else {
            // User not authorized
        }
        return redirect("/dashboard/categories/manage-categories");
    }
}
