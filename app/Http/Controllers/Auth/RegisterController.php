<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function storeTutor(Request $request)
    {   

        $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
            'name' => "",
            'username' => "",

        ]);



        return redirect() -> route('details');

        // dd($request ->emailTutor);
        //store user
        // sign the user in
        //redirect
        
    }
}
