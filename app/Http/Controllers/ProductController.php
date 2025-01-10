<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariation;
use App\Models\ProductVariationColor;
use App\Models\ProductVariationSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show and create product
    public function createProduct(Request $request)
    {
        // dd($request->all());
        // check request method
        if ($request->isMethod('post')) {
            // data validation
            $request->validate([
                // 'product_name' => 'required|max:400',
                'title' => 'required|max:400',
                'full_description' => 'required',
                'sku' => 'required',
            ]);

            // Check the sku is exist or not
            $product = Product::where("product_sku", $request['sku'])->get()->first();
            if ($product != null) {
                // return
                return "Duplicate SKU found.";       
            }

            // Upload File to public/media/products/images
            $imgHelper = new imagesHandler();
            if ($request->hasFile('cover_image')) {
                $thumbnail_1 = $imgHelper->uploadAndGetPath($request->file('cover_image'));
            } else {
                $thumbnail_1 = null;
            }

            // upload others images
            $img_1 = ($request->hasFile('images_1')) ? $imgHelper->uploadAndGetPath($request->file('images_1')) : null;
            $img_2 = ($request->hasFile('images_2')) ? $imgHelper->uploadAndGetPath($request->file('images_2')) : null;
            $img_3 = ($request->hasFile('images_3')) ? $imgHelper->uploadAndGetPath($request->file('images_3')) : null;
            $img_4 = ($request->hasFile('images_4')) ? $imgHelper->uploadAndGetPath($request->file('images_4')) : null;
            $img_5 = ($request->hasFile('images_5')) ? $imgHelper->uploadAndGetPath($request->file('images_5')) : null;
            $img_6 = ($request->hasFile('images_6')) ? $imgHelper->uploadAndGetPath($request->file('images_6')) : null;
            $img_7 = ($request->hasFile('images_7')) ? $imgHelper->uploadAndGetPath($request->file('images_7')) : null;
            $img_8 = ($request->hasFile('images_8')) ? $imgHelper->uploadAndGetPath($request->file('images_8')) : null;
            $img_9 = ($request->hasFile('images_9')) ? $imgHelper->uploadAndGetPath($request->file('images_9')) : null;


            // Create Product with basic information
            $addNew = Product::create([
                // 'title' => $request['productName'],
                'title' => $request->title,
                'product_sku' => $request['sku'],
                'short_description' => $request['short_description'],
                'long_description' => $request['full_description'],
                'model' => $request['model'],
                'price' => $request['single_price'],
                'quantity' => $request['single_quantity'],
                'vendor' => auth()->user()->userToVendor->id,
                'thumbnail_1' => $thumbnail_1,
                'live_status' => 0,
                'model' => $request['model'],
                'brand' => $request['brand'],
                'freeshipping' => $request["freeShipping"],
                'flat_delivery_crg' => $request["flatDeliveryCrg"],
                'cod_status' => $request["cashOnDelivery"],
                'video_platform' => $request["videoPlatForm"],
                'video_link' => $request["videoLink"],
                'discount_type' => $request["discountType"],
                'discount_amount' => $request["discountAmount"],
                'img-1' => $img_1,
                'img-2' => $img_2,
                'img-3' => $img_3,
                'img-4' => $img_4,
                'img-5' => $img_5,
                'img-6' => $img_6,
                'img-7' => $img_7,
                'img-8' => $img_8,
                'img-9' => $img_9,
                'slug' => substr(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ", "-", $request['product_name'] . "-" . uniqid())), 0, 100),
                'product_type' => $request["product_type"]
            ]);

            // Add Categories to this created product
            if (is_array($request["categories"])) {
                foreach ($request["categories"] as $category) {
                    // Add Categories one after one
                    $addCategories = ProductCategory::create([
                        'product_id' => $addNew->id,
                        'category_id' => $category,
                    ]);
                }
            }

            // Add variation of this product
            $productVariation = new ProductVariation();
            for ($i = 0; $i < 10; $i++) {
                if ($request["variation_" . $i . "_size"] != null && $request["variation_" . $i . "_color"] != null && $request["variation_" . $i . "_price"] >= 1) {
                    // Get color detais by color Id
                    $colorList = new ProductVariationColor();
                    if ($request["variation_" . $i . "_color"] != "Select") {
                        $color = $colorList->colorDetailsById($request["variation_" . $i . "_color"]);
                    }

                    // get size details by size id
                    $sizeList = new ProductVariationSize();
                    if ($request["variation_" . $i . "_size"] != "Select") {
                        $size = $sizeList->sizeDetailsById($request["variation_" . $i . "_size"]);
                    }
                    // Set everythis in a array
                    $productVariationData["product_id"] = $addNew->id;
                    $productVariationData["size_id"] = ($request["variation_" . $i . "_size"] == "Select") ? "0" : $request["variation_" . $i . "_size"];
                    $productVariationData["color_id"] = ($request["variation_" . $i . "_color"] == "Select") ? "0" : $request["variation_" . $i . "_color"];
                    $productVariationData["quantity"] = $request["variation_" . $i . "_quantity"];
                    $productVariationData["price"] = $request["variation_" . $i . "_price"];
                    $productVariationData["size_name"] = ($request["variation_" . $i . "_size"] == "Select") ? "not_selected" : $size["size_name"];
                    $productVariationData["color_name"] = ($request["variation_" . $i . "_color"] == "Select") ? "not_selected" : $color["color_name"];
                    $productVariationData["color_code"] = ($request["variation_" . $i . "_color"] == "Select") ? null : $color["color_code"];
                    $variationId = $productVariation->insertAndReturnId($productVariationData);
                }
            }

            //$variationId = $productVariation->insertAndReturnId(["ovi","o"]);
            // return redirect()->route('manage_products')->with('message', 'Product created successfully.');
            alert()->success('Product created successfully.', 'Hey !!');
            return redirect()->route('manage_products');

        } else {

            // Get Categories
            $categories = Category::all();

            // Get Brands
            $brands = Brand::all();

            // Get Colors
            $colors = ProductVariationColor::all();

            // Get Sizes
            $sizes = ProductVariationSize::all();

            // Return
            return view("product.add-product", compact(
                'categories',
                'brands',
                'colors',
                'sizes'
            ));
        }
    }

    // function to manage product view
    public function manageProductView()
    {
        // Get all product details of this vendor
        $productsController = new products();
        $productsList = $productsController->getProductDetailsByVendor(auth()->user()->userToVendor->id, 15);
        // Sent all data to view
        return view("product.products", ["productListDetails" => $productsList, "products_categories" => ProductCategory::find(1)]);
    }


    // This function will view approve product of manage product
    public function manageProductApproveView()
    {
        // Get all product details of this vendor
        $productsController = new products();
        $productsList = $productsController->getProductsByVendorByLiveStatus(auth()->user()->userToVendor->id, 15, 1);
        // Sent all data to view
        return view("product.products", ["productListDetails" => $productsList, "products_categories" => ProductCategory::find(1)]);
    }


    // This function will view pending product of manage product
    public function manageProductPendingView()
    {
        // Get all product details of this vendor
        $productsController = new products();
        $productsList = $productsController->getProductsByVendorByLiveStatus(auth()->user()->userToVendor->id, 15, 0);
        // Sent all data to view
        return view("product.products", ["productListDetails" => $productsList, "products_categories" => ProductCategory::find(1)]);
    }


    // This function will view pending product of manage product
    public  function manageProductRejectView()
    {
        // Get all product details of this vendor
        $productsController = new products();
        $productsList = $productsController->getProductsByVendorByLiveStatus(auth()->user()->userToVendor->id, 15, 2);
        // Sent all data to view
        return view("product.products", ["productListDetails" => $productsList, "products_categories" => ProductCategory::find(1)]);
    }

    // function to edit single product
    public function editSingleProduct(Request $request)
    {
        if ($request->method('post')) {
            $productSlug = $request->slug; // Unique identity of this product
            // Find old product
            $oldProduct = Product::where("slug", $productSlug)->get()->first();

            // Upload File to public/media/products/images
            $imgHelper = new imagesHandler();
            if ($request->hasFile('covor_images')) {
                $thumbnail_1 = $imgHelper->uploadAndGetPath($request->file('covor_images'));
            } else {
                $thumbnail_1 = $oldProduct["thumbnail_1"];
            }
            // upload others images
            $img_1 = ($request->hasFile('images_1')) ? $imgHelper->uploadAndGetPath($request->file('images_1')) : $oldProduct["img-1"];
            $img_2 = ($request->hasFile('images_2')) ? $imgHelper->uploadAndGetPath($request->file('images_2')) : $oldProduct["img-2"];
            $img_3 = ($request->hasFile('images_3')) ? $imgHelper->uploadAndGetPath($request->file('images_3')) : $oldProduct["img-3"];
            $img_4 = ($request->hasFile('images_4')) ? $imgHelper->uploadAndGetPath($request->file('images_4')) : $oldProduct["img-4"];
            $img_5 = ($request->hasFile('images_5')) ? $imgHelper->uploadAndGetPath($request->file('images_5')) : $oldProduct["img-5"];
            $img_6 = ($request->hasFile('images_6')) ? $imgHelper->uploadAndGetPath($request->file('images_6')) : $oldProduct["img-6"];
            $img_7 = ($request->hasFile('images_7')) ? $imgHelper->uploadAndGetPath($request->file('images_7')) : $oldProduct["img-7"];
            $img_8 = ($request->hasFile('images_8')) ? $imgHelper->uploadAndGetPath($request->file('images_8')) : $oldProduct["img-8"];
            $img_9 = ($request->hasFile('images_9')) ? $imgHelper->uploadAndGetPath($request->file('images_9')) : $oldProduct["img-9"];


            // Create Product with basic information
            $editNew = Product::where("slug", $productSlug)->update([
                'title' => $request['productName'],
                'short_description' => $request['short_description'],
                'long_description' => $request['full_description'],
                'model' => $request['model'],
                'price' => $request['single_price'],
                'quantity' => $request['single_quantity'],
                'vendor' => auth()->user()->userToVendor->id,
                'thumbnail_1' => $thumbnail_1,
                'live_status' => $oldProduct["live_status"],
                'model' => $request['model'],
                'brand' => $request['brand'],
                'freeshipping' => $request["freeShipping"],
                'flat_delivery_crg' => $request["flatDeliveryCrg"],
                'cod_status' => $request["cashOnDelivery"],
                'video_platform' => $request["videoPlatForm"],
                'video_link' => $request["videoLink"],
                'discount_type' => $request["discountType"],
                'discount_amount' => $request["discountAmount"],
                'img-1' => $img_1,
                'img-2' => $img_2,
                'img-3' => $img_3,
                'img-4' => $img_4,
                'img-5' => $img_5,
                'img-6' => $img_6,
                'img-7' => $img_7,
                'img-8' => $img_8,
                'img-9' => $img_9,
                'product_type' => $request["product_type"]
            ]);

            // Categories Update
            // Delete previous categories
            ProductCategory::where('product_id', $oldProduct["id"])->delete();
            // Select all categories from products categories
            if (is_array($request["categories"])) {
                foreach ($request["categories"] as $category) {
                    // Add Categories one after one
                    $addCategories = ProductCategory::create([
                        'product_id' => $oldProduct["id"],
                        'category_id' => $category,
                    ]);
                }
            }
            // Variation
            // Delete previous Variation
            ProductVariation::where('product_id', $oldProduct["id"])->delete();
            // Add new variation
            $productVariation = new ProductVariation();
            for ($i = 0; $i < 10; $i++) {

                if ($request["variation_" . $i . "_size"] != null && $request["variation_" . $i . "_color"] != null && $request["variation_" . $i . "_price"] >= 1) {
                    // Get color detais by color Id
                    $colorList = new ProductVariationColor();
                    if ($request["variation_" . $i . "_color"] != "Select") {
                        $color = $colorList->colorDetailsById($request["variation_" . $i . "_color"]);
                    }

                    // get size details by size id
                    $sizeList = new ProductVariationSize();
                    if ($request["variation_" . $i . "_size"] != "Select") {
                        $size = $sizeList->sizeDetailsById($request["variation_" . $i . "_size"]);
                    }

                    // Set everythis in a array
                    $productVariationData["product_id"] = $oldProduct["id"];

                    $productVariationData["size_id"] = ($request["variation_" . $i . "_size"] == "Select") ? "0" : $request["variation_" . $i . "_size"];
                    $productVariationData["color_id"] = ($request["variation_" . $i . "_color"] == "Select") ? "0" : $request["variation_" . $i . "_color"];
                    $productVariationData["quantity"] = $request["variation_" . $i . "_quantity"];
                    $productVariationData["price"] = $request["variation_" . $i . "_price"];
                    $productVariationData["size_name"] = ($request["variation_" . $i . "_size"] == "Select") ? "not_selected" : $size["size_name"];
                    $productVariationData["color_name"] = ($request["variation_" . $i . "_color"] == "Select") ? "not_selected" : $color["color_name"];
                    $productVariationData["color_code"] = ($request["variation_" . $i . "_color"] == "Select") ? null : $color["color_code"];
                    $variationId = $productVariation->insertAndReturnId($productVariationData);
                }
            }

            return redirect("/dashboard/edit-product/$productSlug");
        } else {
            // Get Categories List
            $categoriesController = new Category();
            $categoriesList = $categoriesController->allCategoriesList();
            // Get All brand information
            $brandController = new Brand();
            $brandList = $brandController->allBrandList();
            // get all color list
            $color = new ProductVariationColor();
            $colorList = $color->allColorList();
            // Get all size list
            $size = new ProductVariationSize();
            $sizeList = $size->allSizeList();
            // edit product details
            $productController = new Product();
            $editProductDetails = $productController->getProductDetailsBySlug($request["slug"]);
            if ($editProductDetails == null) {
                // Product no exist
                return redirect("/dashboard/manage-product");
            }
            // Find categories by product id
            $productCategories = $categoriesController->getProductCategoriesListById($editProductDetails["id"]);
            return view("product.edit-product", ["allCategories" => $categoriesList, "allBrand" => $brandList, "allColor" => $colorList, "allSize" => $sizeList, "editProductDetails" => $editProductDetails, "productCategoriesList" => $productCategories]);
        }
    }



    // function to delete single product
    function deleteSingleProduct($productId)
    {
        // This function will delete product from database - Be sure you maynot undo after delete a product
        $product = Product::find($productId);
        $product->delete();
        return response()->json(['success' => "true"]);
    }


    // This function will delete product images from sinle product
    function deleteProductImage(Request $request)
    {
        $res = Product::where("slug", $request->slug)->update([
            "$request->column" => null
        ]);
        return $res;
    }

    // This function will return products details when user is admin
    function searchProductsByAdmin(Request $request)
    {
        $productsDetailsList = Product::where("title", "like", "%{$request['query']}%")->where("vendor", auth()->user()->userToVendor->id)->limit(5)->get();
        return $productsDetailsList;
    }
}
