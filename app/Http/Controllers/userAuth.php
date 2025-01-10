<?php

namespace App\Http\Controllers;

use App\Models\temp_user_vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Use for Hash password check
use App\Models\vendor; // Use for vendors
use App\Http\Controllers\temp_user_customers;
use App\Models\temp_user_customer;
use App\Http\Controllers\smsApi;
use App\Mail\SendOTPmail;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class userAuth extends Controller
{

    //This function will execute after send a request to get an OTP at forget password option.
    public function submitPasswordResetRequest(Request $request)
    {
        $request->validate([
            'mobile' => 'required|min:11,max:15'
        ]);

        $user = vendor::where('username', $request->mobile)->first();
        if (!$user) {
            alert()->error('User not found. Please, enter a registered phone number.', 'Invalid user !!');
            return redirect()->back();
        }

        $otp_code = rand(11111, 99999);
        $request->session()->put('tempUsername', $user->username);
        $createTempUser = TempUserVendorcreate([
            "phone" => $request->mobile,
            "otp" => $otp_code
        ]);

        // Send otp code to user mobile
        $smsContent = "Your OTP for Nagadhat is " . $otp_code . ".\nHelp line: 09602444444";
        $smsSender = new smsApi();
        $smsSender->sendSingleSms($createTempUser["phone"], $smsContent);
        try {
            // Send OTP to User Email
            if ($user->email) {
                $data = [
                    'subject'   => 'OTP for NagadHatBD',
                    'otp'       => $otp_code,
                    'user'      => $user->owner_name,
                ];
                Mail::to($user->email)->send(new SendOTPmail($data));
            }
        } catch (Exception $e) {
            // return 'Oops! Something went wrong. Please try again.';
            Log::error($e);
        }
        alert()->success('Varification code has been sent to your number.', 'OTP sent');
        return view('otp-verify');
    }

    // function to verify and submit otp code
    public function verifyResetPasswordOtp(Request $request)
    {
        $userGivenOtp = $request->user_otp;
        $tempUserFound = TempUserVendorwhere("phone", Session("tempUsername"))->latest()->first();

        if ($tempUserFound->otp == $userGivenOtp) {
            // User Found and Otp Verify and delete temp data
            $deleteTempData = TempUserVendorwhere("phone", Session("tempUsername"))->delete();
            // redirect to enter new password page
            return redirect()->route('show_new_password_page');
        } else {
            // User not Found or Otp not Verify
            alert()->error('Otp not correct..', 'Error !!');
            return view('otp-verify');
        }
    }

    // function to save new password
    public function updateNewPassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = vendor::where('username', Session("tempUsername"))->first();
        if ($user) {
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);
            Session::flush();
            alert()->success('Your password has been reset.', 'Done !!');
            return redirect()->route('login_page');
        } else {
            alert()->error('Your session has expired.', 'Sorry !!');
            return redirect()->route('login_page');
        }
        return redirect()->back();
    }
}
