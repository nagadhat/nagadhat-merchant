<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User_admin; // Use for User_admin model
use App\Models\products_categorie; // Use for products_categories


use App\Http\Controllers\userDetails; // Use for get user information faster
use App\Http\Controllers\categories; // Use for categories operation
use App\Http\Controllers\brands; // Use for categories operation
use App\Http\Controllers\productsVariationColor; // use for product variation (Color Variation)
use App\Http\Controllers\productsVariationSize; // Use for product variation (Size variation)


class dashboard extends Controller
{


    //Home page of /dashboard
    function homepage()
    {
        return view("dashboard");
    }
    /* ====================================================================== *
     * ========================      PRODUCTS      ========================== *
     * ====================================================================== *
     */

    // Add product page /dashboard/add-product
    // function addProductView()
    // {
    //     // Get Categories List
    //     $categoriesController = new categories();
    //     $categoriesList = $categoriesController->allCategoriesList();
    //     // Get All brand information
    //     $brandController = new brands();
    //     $brandList = $brandController->allBrandList();
    //     // get all color list
    //     $color = new productsVariationColor();
    //     $colorList = $color->allColorList();
    //     // Get all size list
    //     $size = new productsVariationSize();
    //     $sizeList = $size->allSizeList();
    //     return view("product.add-product", ["allCategories" => $categoriesList, "allBrand" => $brandList, "allColor" => $colorList, "allSize" => $sizeList]);
    // }
    
    // function manageProductView()
    // {
    //     // Get all product details of this vendor
    //     $productsController = new products();
    //     $productsList = $productsController->getProductDetailsByVendor(auth()->user()->userToVendor->id, 15);
    //     // Sent all data to view
    //     return view("product.manage-products", ["productListDetails" => $productsList, "products_categories" => products_categorie::find(1)]);
    // }

    // This function will view approve product of manage product
    // function manageProductApproveView()
    // {
    //     // Get all product details of this vendor
    //     $productsController = new products();
    //     $productsList = $productsController->getProductsByVendorByLiveStatus(auth()->user()->userToVendor->id, 15, 1);
    //     // Sent all data to view
    //     return view("product.manage-products", ["productListDetails" => $productsList, "products_categories" => products_categorie::find(1)]);
    // }


    // This function will view pending product of manage product
    // function manageProductPendingView()
    // {
    //     // Get all product details of this vendor
    //     $productsController = new products();
    //     $productsList = $productsController->getProductsByVendorByLiveStatus(auth()->user()->userToVendor->id, 15, 0);
    //     // Sent all data to view
    //     return view("product.manage-products", ["productListDetails" => $productsList, "products_categories" => products_categorie::find(1)]);
    // }

    // This function will view pending product of manage product
    // function manageProductRejectView()
    // {
    //     // Get all product details of this vendor
    //     $productsController = new products();
    //     $productsList = $productsController->getProductsByVendorByLiveStatus(auth()->user()->userToVendor->id, 15, 2);
    //     // Sent all data to view
    //     return view("product.manage-products", ["productListDetails" => $productsList, "products_categories" => products_categorie::find(1)]);
    // }

    // function editSingleProductView(Request $request)
    // {
    //     // Get Categories List
    //     $categoriesController = new categories();
    //     $categoriesList = $categoriesController->allCategoriesList();
    //     // Get All brand information
    //     $brandController = new brands();
    //     $brandList = $brandController->allBrandList();
    //     // get all color list
    //     $color = new productsVariationColor();
    //     $colorList = $color->allColorList();
    //     // Get all size list
    //     $size = new productsVariationSize();
    //     $sizeList = $size->allSizeList();
    //     // edit product details
    //     $productController = new products();
    //     $editProductDetails = $productController->getProductDetailsBySlug($request["slug"]);
    //     if ($editProductDetails == null) {
    //         // Product no exist
    //         return redirect("/dashboard/manage-product");
    //     }
    //     // Find categories by product id
    //     $productCategories = $categoriesController->getProductCategoriesListById($editProductDetails["id"]);
    //     return view("product.edit-product", ["allCategories" => $categoriesList, "allBrand" => $brandList, "allColor" => $colorList, "allSize" => $sizeList, "editProductDetails" => $editProductDetails, "productCategoriesList" => $productCategories]);
    // }

    /* ====================================================================== *
     * ========================     Categories     ========================== *
     * ====================================================================== *
     */

    // Add category
    function addNewCategoryView()
    {
        return view("categories.add-category");
    }

    // This function will show manage categories section
    function showManageCategoriesView()
    {
        $categoriesController = new categories();
        $allCategoriesInfoList = $categoriesController->allCategoriesList();
        return view("categories.manage-categories", ["allCategoriesDetailsList" => $allCategoriesInfoList]);
    }
    // Edit category view
    function showEditCategoriesView(Request $request)
    {
        $slug = $request["slug"];
        $categoryController = new categories();
        $categoryDetails = $categoryController->getCategoryDetailsBySlug($slug);
        return view("categories.edit-category", ["categoryDetails" => $categoryDetails]);
    }


    /* ====================================================================== *
     * ========================        Order       ========================== *
     * ====================================================================== *
     */
    function newOrdersView()
    {
        return view("orders.new-orders");
    }


    /* ====================================================================== *
     * ========================    Variation       ========================== *
     * ====================================================================== *
     */
    // Color
    function showManageColorView()
    {
        return view("color.manage-color");
    }
    function showEditColorView(Request $request)
    {
        $colorId = $request["id"];
        $colorController = new productsVariationColor();
        $colorDetails = $colorController->getColorDetailsById($colorId);
        if ($colorDetails == null) {
            // No color found
            return "No color found";
        } else {
            // Color found
            return view("color.edit-color", ["colorDetails" => $colorDetails]);
        }
    }
    // Size
    function showManageSizeView(Request $request)
    {
        return view("size.manage-size");
    }
    function showEditSizeView(Request $request)
    {
        $sizeId = $request["id"];
        $sizeController = new productsVariationSize();
        $sizeDetails = $sizeController->sizeDetailsById($sizeId);
        if ($sizeDetails == null) {
            // No color found
            return "No color found";
        } else {
            // Color found
            return view("size.edit-size", ["sizeDetails" => $sizeDetails]);
        }
    }
}
