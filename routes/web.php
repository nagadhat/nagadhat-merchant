<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuth; // userAuth controller for user authentication.
use App\Http\Controllers\notLoginUser; // This controller will care about not login user
use App\Http\Controllers\dashboard; // This controlller will care about dashboard and similer
use App\Http\Controllers\products; // This controller will operate product related operation
use App\Http\Controllers\productsVariations; // This controler will handle product variation related operation
use App\Http\Controllers\banglafontissue; // Delete after compelete the font issue
use App\Http\Controllers\categories; // Use for categories
use App\Http\Controllers\brands; // Use for brands
use App\Http\Controllers\orders; // Use for orders
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\productsVariationColor; // Use for color
use App\Http\Controllers\productsVariationSize; // Use for size
use App\Http\Controllers\profile;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home page
Route::get('/', function () {
    return redirect()->route('sign_in');
});

// auth routes
Route::match(['get', 'post'], '/login', [AuthController::class, 'sign_in'])->name('sign_in');
Route::match(['get', 'post'], '/register', [AuthController::class, 'sign_up'])->name('sign_up');

Route::prefix('auth')->group(function () {
    // otp verification
    Route::match(['get', 'post'], 'otp-verification', [AuthController::class, 'otp_verification'])->name('otp_verification');
});

//Routes for Reset Merchant Password
Route::get('/merchant/forget-password', function () {
    return view('forget-password');
})->name('forget-password');
Route::post('/merchant/reset-password', [userAuth::class, 'submitPasswordResetRequest'])->name('reset-password');
Route::post('/merchant/otp-verify', [userAuth::class, 'verifyResetPasswordOtp'])->name('reset_password_otp_verification');
Route::get('/merchant/new-password', function () {
    return view('new-password');
})->name('show_new_password_page');
Route::post('/merchant/update-password', [userAuth::class, 'updateNewPassword'])->name('merchant-update-password');


// only authenticated users can access these routes
Route::group(['prefix' => 'app', 'middleware' => ['userValidation']], function () {
    Route::get('/dashboard', [dashboard::class, 'homepage'])->name('dashboard');
    Route::get('/log-out', [AuthController::class, 'sign_out'])->name('sign_out');

    /*=================================================================================
        # Product Routes
    =================================================================================*/
    Route::controller(ProductController::class)->group(function () {
        Route::match(['get', 'post'], '/product/create', 'createProduct')->name('create_product');
        Route::get('/products', 'manageProductView')->name('manage_products');
        Route::get('/products/pendings', 'manageProductPendingView')->name('pending_product_view');
        Route::get('/products/approved', 'manageProductApproveView')->name('approve_product_view');
        Route::get('/products/rejected', 'manageProductRejectView')->name('reject_product_view');
        Route::match(['get', 'post'], '/product/edit/{slug}', 'editSingleProduct')->name('edit_single_product');
        Route::delete("/product/delete/{productId}", 'deleteSingleProduct');
        Route::post("/api/product/remove-image/{slug}", 'deleteProductImage');
        Route::get("/api/admin/search/get/{query}", 'searchProductsByAdmin');
    });

    /*=================================================================================
        # Profile Routes
    =================================================================================*/
    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get("/", "profile")->name('show_profile_page');
        Route::post("/update/general", "update_general")->name('update_general');
        Route::post("/update/shop", "update_shop")->name('update_shop');
        Route::post("/update/kyc", "update_kyc")->name('update_kyc');
        Route::post("/update/bank", "update_bank")->name('update_bank');
        Route::post("/update/business", "update_business")->name('update_business');
        Route::post("/update/business-address", "update_business_address")->name('update_business_address');
        Route::get('/show-password', 'showPassword')->name('show_password');
        Route::post('/update-password', 'updatePassword')->name('update_password');

    });

});

/*=================================================================================
    # Test Routes
=================================================================================*/
Route::get("/test", function () {
    return response([
        'message' => 'Something is happening in background.'
    ]);
});
