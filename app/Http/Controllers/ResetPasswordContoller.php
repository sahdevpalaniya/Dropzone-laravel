<?php

namespace App\Http\Controllers;


use App\Models\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Hash;



class ResetPasswordContoller extends Controller
{
    public function index()
    {   
        return view('forgot');
    }

    public function submitForget(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
        ]);
         $token =Str::random(64);

         DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
         ]);

         Mail::send('demoMail',['token'=>$token],function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
         });

         return back()->with('message','We have e-mailed your password reset link !');
    }

    public function resetpasswordform($token){
        return view('resetpasswordform')->with($token);
    }
}
