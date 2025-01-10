<?php

namespace App\Http\Controllers;

use App\Models\TempUserVendor;
use App\Models\User;
use App\Models\vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psy\Util\Str;

class AuthController extends Controller
{
    // function to show and perform sign-in
    public function sign_in(Request $request)
    {
        // check request method
        if ($request->isMethod('post')) {
            // data validation
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            // sign-in and redirect
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (auth()->user()->user_type == 'vendor' || auth()->user()->user_type == 'admin') {
                    alert()->success('You are signed-in successfully.', 'Hey !!');
                    return redirect()->route('dashboard');
                } else {
                    Auth::logout();
                }
            }

            // return back to sign-in
            return redirect()->route('sign_in');
        } else {
            // return to sign-in
            return view('Auth.login');
        }
    }

    // functio to sign-out
    public function sign_out()
    {
        Auth::logout();
        alert()->success('You are logged-out successfully.', 'Hey !!');
        return redirect()->route('sign_in');
    }

    // function to show and perform sign-up
    public function sign_up(Request $request)
    {
        // check request method
        if ($request->isMethod('post')) {
            // data validation
            $request->validate([
                'name' => 'required',
                'password' => 'required|min:6',
                'phone_number' => 'required|min:11,max:15',
                'shop_type' => 'required',
                'shop_name' => 'required',
                'location' => 'required',
                'users_name' => 'required',
                'email' => 'required',
                'password' => 'required|min:6',
            ]);

            // filter and clean phone no.
            $phone_no = $request->phone_number;
            if (Str::startsWith($phone_no, "+8801")) {
                $phone_no = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace('-', '', Str::substrReplace($phone_no, '', 0, 3)));
            } else {
                $phone_no = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace('-', '', $phone_no));
            }

            // if already exist the phone no.
            $user = User::where('username', $phone_no)->first();
            if ($user) {
                if ($user->user_type == 'centralAdmin' || $user->user_type == 'agent') {
                    alert()->warning('Can not sign up with this number.', 'Sorry !!')->persistent('Ok');
                    return redirect()->route('sign_in');
                } elseif ($user->user_type == 'vendor') {
                    alert()->warning('User already exists. Recover account ?', 'Wait !!')->persistent('Ok');
                    return redirect()->route('sign_in');
                }
            }

            // create as temp vendor
            $otp_code = rand(11111, 99999);
            $tempUserCreate = TempUserVendorcreate([
                "shop_name" => $request->shop_name,
                "shop_type" => $request->shop_type,
                "location" => $request->location,
                "users_name" => $request->users_name,
                "phone" => $phone_no,
                "email" => $request->email,
                "password" => bcrypt($request->pasword),
                "otp" => $otp_code,
            ]);

            // Send otp code to vendor
            $smsContent = "Your OTP for Nagadhat is " . $otp_code . ".\nHelp line: 09602444444";
            $smsSender = new smsApi();
            $smsSender->sendSingleSms($tempUserCreate->phone, $smsContent);

            try {
                //Send OTP to users phone
                $data = [
                    'subject'   => 'NagadHat Merchant Registration',
                    'otp'       => $otp_code,
                    'user'      => $tempUserCreate->users_name,
                ];
            } catch (Exception $e) {
                Log::error($e);

                // return back to sign-up
                return redirect()->route('sign_up');
            }

            // Session
            $request->session()->put('tempUserPhone', $tempUserCreate->phone);

            // return to otp verification
            return redirect()->route('show_otp_verify_page');
        } else {
            // return to sign-up
            return view('Auth.login');
        }
    }

    // function show and verify otp
    public function otp_verification(Request $request)
    {
        // check request method
        if ($request->isMethod('post')) {
            // check temp vendor with otp
            $temp_user = TempUserVendorwhere("otp", $request->user_otp)->first();

            // check vendor exist or not
            if (sizeof($temp_user) >= 1) {
                $unique_code = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $temp_user->shop_name));
                $support_pin = rand(111, 999);

                // check user exist with the phon no. or not
                $user = User::where('username', $temp_user->phone)->first();
                if ($user) {
                    if ($user->user_type == 'centralAdmin' || $user->user_type == 'agent') {
                        alert()->warning('Can not sign-up with this number.', 'Sorry !!')->persistent('Ok');
                        return redirect()->route('sign_in');
                    }

                    if ($user->user_type == 'customer') {
                        $user->user_type = 'vendor';
                    }

                    $user->save();
                } else {
                    $user = User::create([
                        "username" => $temp_user->phone,
                        "password" => $temp_user->password,
                        "email" => $temp_user->email,
                        "phone" => $temp_user->phone,
                        "user_type" => 'vendor',
                        "unique_key" => uniqid()
                    ]);
                }

                $vendor = vendor::create([
                    "u_id" => $user->id,
                    "username" => $temp_user->phone,
                    "contact_number_1" => $temp_user->phone,
                    "contact_email_1" => $temp_user->email,
                    "vendor_unique_code" => $unique_code,
                    "vendor_support_pin" => $support_pin,
                    "shop_name" => $temp_user->shop_name,
                    "status" => 0,
                    "users_name" => $temp_user->users_name,
                    "shop_type" => $temp_user->shop_type,
                    "location" => $temp_user->location,
                    "slug" => $unique_code . rand(1111, 9999)
                ]);

                // delete temp user
                $temp_user->delete();
            } else {
                // return to sign-in
                alert()->error('Invalid OTP provided.', 'Error !!');
                return redirect()->route('sign_in');
            }
        } else {
            // return to otp verification
            return view('Auth.otp-verify');
        }
    }
}
