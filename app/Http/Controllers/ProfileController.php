<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AddressAssign;
use App\Models\Category;
use App\Models\User;
use App\Models\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;

class ProfileController extends Controller
{
    // function to display profile page
    public function profile()
    {
        $allCategories = Category::where('status', 1)->get();
        return view('profile.profile-manage', compact('allCategories'));
    }

    // function to update general information
    public function update_general(Request $request)
    {
        $userData = User::find(auth()->user()->id);
        $userData->update([
            "email" => $request->email,
        ]);
        $findUser = vendor::find(auth()->user()->userToVendor->id);
        $findUser->update([
            "owner_name" => $request->owner_name,
            "responsible_person_full_name" => $request->responsible_person_full_name,
            "responsible_person_phone" => $request->responsible_person_phone,
            "responsible_person_email" => $request->responsible_person_email,
        ]);
        alert()->success('Great Job !', 'Updated successfully');
        return redirect()->back();
    }

    // function to update shop information
    public function update_shop(Request $request)
    {
        $findUser = vendor::find(auth()->user()->userToVendor->id);
        // Upload File to public/media/vendor
        $imgHelper = new imagesHandler();
        if ($request->hasFile('logo')) {
            $logo = $imgHelper->uploadImageAndGetPath($request->file('logo'));
            $findUser->update([
                "logo" => $logo,
            ]);
        }
        if ($request->hasFile('banner')) {
            $banner = $imgHelper->uploadImageAndGetPath($request->file('banner'));
            $findUser->update([
                "banner" => $banner
            ]);
        }
        $findUser->update([
            "shop_name" => $request->shop_name,
            "location" => $request->location,
        ]);
        alert()->success('Great Job !', 'Updated successfully');
        return redirect()->back();
    }

    // function to KYC general information
    public function update_kyc(Request $request)
    {
        $findUser = vendor::find(auth()->user()->userToVendor->id);
        $findUser->update([
            "responsible_person_nid" => $request->responsible_person_nid,
            "trade_license" => $request->trade_license,
        ]);
        // Upload File to public/media/vendor
        $imgHelper = new imagesHandler();
        if ($request->hasFile('responsible_person_nid_front')) {
            $responsible_person_nid_front = $imgHelper->uploadImageAndGetPath($request->file('responsible_person_nid_front'));
            $findUser->update([
                "responsible_person_nid_front" => $responsible_person_nid_front,
            ]);
        }
        if ($request->hasFile('responsible_person_nid_back')) {
            $responsible_person_nid_back = $imgHelper->uploadImageAndGetPath($request->file('responsible_person_nid_back'));
            $findUser->update([
                "responsible_person_nid_back" => $responsible_person_nid_back
            ]);
        }
        // upload trade licance file
        if ($request->hasFile('trade_license_file')) {
            $trade_license_file = $imgHelper->uploadFileAndGetPath($request->file('trade_license_file'));
            $findUser->update([
                "trade_license_file" => $trade_license_file
            ]);
        }
        alert()->success('Great Job !', 'Updated successfully');
        return redirect()->back();
    }

    // function to update bank information
    public function update_bank(Request $request)
    {
        $findUser = vendor::find(auth()->user()->userToVendor->id);
        $findUser->update([
            "bank_account_name" => $request->bank_account_name,
            "bank_account_number" => $request->bank_account_number,
            "bank_account_branch" => $request->bank_account_branch,
            "bank_account_routing" => $request->bank_account_routing
        ]);
        // Upload File to public/media/vendor
        $imgHelper = new imagesHandler();
        if ($request->hasFile('bank_check')) {
            $bank_check = $imgHelper->uploadImageAndGetPath($request->file('bank_check'));
            $findUser->update([
                "bank_check" => $bank_check,
            ]);
        }
        alert()->success('Great Job !', 'Updated successfully');
        return redirect()->back();
    }

    // function to update business information
    public function update_business(Request $request)
    {
        $findUser = vendor::find(auth()->user()->userToVendor->id);
        $findUser->update([
            "business_product_type" => $request->business_product_type,
            "business_reg_number" => $request->business_reg_number,
            "business_tin" => $request->business_tin,
        ]);
        // Upload File to public/media/vendor
        $imgHelper = new imagesHandler();
        if ($request->hasFile('business_visiting_card')) {
            $business_visiting_card = $imgHelper->uploadImageAndGetPath($request->file('business_visiting_card'));
            $findUser->update([
                "business_visiting_card" => $business_visiting_card,
            ]);
        }
        // upload business document file
        if ($request->hasFile('business_document')) {
            $business_document = $imgHelper->uploadFileAndGetPath($request->file('business_document'));
            $findUser->update([
                "business_document" => $business_document
            ]);
        }
        alert()->success('Great Job !', 'Updated successfully');
        return redirect()->back();
    }

    // function to update business address
    public function update_business_address(Request $request)
    {
        $findUser = vendor::find(auth()->user()->userToVendor->id);

        // head office
        if ($request->office_address) {
            if ($findUser->head_office_address) {
                $findAddressAssign = AddressAssign::find($findUser->head_office_address);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->office_address,
                    "postal_code" => $request->office_zip,
                    "city" => $request->office_city,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->office_address,
                    "postal_code" => $request->office_zip,
                    "city" => $request->office_city,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "head_office_address" => $addressAssign->id,
                ]);
            }
        }

        // warehouse 1
        if ($request->warehouse_1_address) {
            if ($findUser->warehouse_address_1) {
                $findAddressAssign = AddressAssign::find($findUser->warehouse_address_1);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->warehouse_1_address,
                    "postal_code" => $request->warehouse_1_zip,
                    "city" => $request->warehouse_1_city,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->warehouse_1_address,
                    "postal_code" => $request->warehouse_1_zip,
                    "city" => $request->warehouse_1_city,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "warehouse_address_1" => $addressAssign->id,
                ]);
            }
        }

        // warehouse 2
        if ($request->warehouse_2_address) {
            if ($findUser->warehouse_address_2) {
                $findAddressAssign = AddressAssign::find($findUser->warehouse_address_2);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->warehouse_2_address,
                    "postal_code" => $request->warehouse_2_zip,
                    "city" => $request->warehouse_2_city,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->warehouse_2_address,
                    "postal_code" => $request->warehouse_2_zip,
                    "city" => $request->warehouse_2_city,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "warehouse_address_2" => $addressAssign->id,
                ]);
            }
        }

        // warehouse 3
        if ($request->warehouse_3_address) {
            if ($findUser->warehouse_address_3) {
                $findAddressAssign = AddressAssign::find($findUser->warehouse_address_3);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->warehouse__address,
                    "postal_code" => $request->warehouse_3_zip,
                    "city" => $request->warehouse_3_city,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->warehouse_3_address,
                    "postal_code" => $request->warehouse_3_zip,
                    "city" => $request->warehouse_3_city,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "warehouse_address_3" => $addressAssign->id,
                ]);
            }
        }

        // warehouse 4
        if ($request->warehouse_4_address) {
            if ($findUser->warehouse_address_4) {
                $findAddressAssign = AddressAssign::find($findUser->warehouse_address_4);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->warehouse_4_address,
                    "postal_code" => $request->warehouse_4_zip,
                    "city" => $request->warehouse_4_city,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->warehouse_4_address,
                    "postal_code" => $request->warehouse_4_zip,
                    "city" => $request->warehouse_4_city,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "warehouse_address_4" => $addressAssign->id,
                ]);
            }
        }

        // warehouse 5
        if ($request->warehouse_5_address) {
            if ($findUser->warehouse_address_5) {
                $findAddressAssign = AddressAssign::find($findUser->warehouse_address_5);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->warehouse_5_address,
                    "postal_code" => $request->warehouse_5_zip,
                    "city" => $request->warehouse_5_city,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->warehouse_5_address,
                    "postal_code" => $request->warehouse_5_zip,
                    "city" => $request->warehouse_5_city,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "warehouse_address_5" => $addressAssign->id,
                ]);
            }
        }


        // return address 1
        if ($request->return_address_1) {
            if ($findUser->return_address_1) {
                $findAddressAssign = AddressAssign::find($findUser->return_address_1);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->return_address_1,
                    "postal_code" => $request->return_zip_1,
                    "city" => $request->return_city_1,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->return_address_1,
                    "postal_code" => $request->return_zip_1,
                    "city" => $request->return_city_1,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "return_address_1" => $addressAssign->id,
                ]);
            }
        }

        // return address 2
        if ($request->return_address_2) {
            if ($findUser->return_address_2) {
                $findAddressAssign = AddressAssign::find($findUser->return_address_2);
                $findAddress = Address::find($findAddressAssign->address_id)->update([
                    "address_1" => $request->return_address_2,
                    "postal_code" => $request->return_zip_2,
                    "city" => $request->return_city_2,
                ]);
            } else {
                $newAddress = Address::create([
                    "address_1" => $request->return_address_2,
                    "postal_code" => $request->return_zip_2,
                    "city" => $request->return_city_2,
                    "country" => "Bangladesh"
                ]);
                $addressAssign = AddressAssign::create([
                    "username" => $findUser->username,
                    "user_id" => $findUser->id,
                    "address_id" => $newAddress->id,
                ]);
                $findUser->update([
                    "return_address_2" => $addressAssign->id,
                ]);
            }
        }

        alert()->success('Great Job !', 'Updated successfully');
        return redirect()->back();
    }

    // function to show update password page
    public function showPassword()
    {
        return view('profile.show-password');
    }

    // function to update password
    public function updatePassword(Request $request)
    {
        $validUser = User::find(auth()->id());
        // function to check the current password
        if (!Hash::check($request->input('current_password'), $validUser->password)) {
            return redirect()->back()->with('error', 'Please, enter the correct password');
        }

        // check validation
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed|different:current_password|',
        ]);

        $validUser->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password Update successfully.');
    }
}
