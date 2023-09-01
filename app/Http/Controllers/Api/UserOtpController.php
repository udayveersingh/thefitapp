<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;

class UserOtpController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json(['success' => 'true'], 200); 
    }

    public function create(Request $request)
    {
        // dd($request->email);
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::where("email",'=',$request->email)->first();
        if(is_null($user)){
            return response()->json(['success' => false, "message" => "Invalid User"], 404);
        }

        if($otpcode = $this->generateOtp($request->email)){
            //TODO: Send Email to customer with OTP Code
            $mail_details = [
                // 'subject' => 'Testing Application OTP',
                'body' => 'Your OTP is : '. $otpcode
            ];
            Mail::to($request->email)->send(new sendEmail($mail_details));
            return response()->json(['success' => true, "message" => "OTP sent successfully"], 200);
        }else{
            return response()->json(['success' => false, "message" => "Failed to send OTP"], 400);
        }
    }
    
    public function verify(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        $verificationCode   = UserOtp::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = Carbon::now();
        if (!$verificationCode) {
            return response()->json(['success' => false, "message" => "Your OTP is not correct"], 404);
        }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
            return response()->json(['success' => false, "message" => "Your OTP has been expired"], 404);
        }

        $user = User::find($request->user_id);

        if($user){
            $verificationCode->update([
                'expire_at' => Carbon::now()
            ]);

            $user->update([
                'verified'  => 1,
                'email_verified_at'  => Carbon::now(),
            ]);

            return response()->json(['success' => true, "message" => "User verified successfully"], 200);
        }
    }

    public function generateOtp($email)
    {
        $user = User::where('email', $email)->first();

        # User Does not Have Any Existing OTP
        $verificationCode = UserOtp::where('user_id', $user->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)){
            return $verificationCode;
        }

        // Create a New OTP
        return UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expire_at' => Carbon::now()->addMinutes(10),
            'created_at' => Carbon::now()
        ]);
    }
}
