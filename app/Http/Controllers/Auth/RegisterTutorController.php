<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;



class RegisterTutorController extends Controller
{
    public function index()
    {   
        return view(('auth.registerTutor'));
    }

    public function storeTutor(Request $request)
    {   

        $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user === null) {
            
            $user = User::create([
                'email' => $request -> email,
                'password' => Hash::make($request -> password),
                'username' => "",
                'gender' => "",
                'phone' => "",
                'dob' => Carbon::parse('01/01/0001'),
            ]);
    
            auth() -> attempt($request->only('email','password'));
    
            $user->sendEmailVerificationNotification();

            return redirect() -> route('detailsTutor');


        } 
    
        else {        
            return back() -> with('status','This email already taken, please check again');
        }
        
    }

    
}
