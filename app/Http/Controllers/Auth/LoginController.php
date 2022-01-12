<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{
    public function index()
    {   
        
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user' =>'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($request -> user == 'tutor'){
            auth() ->guard('web') -> attempt($request->only('email','password'));
            if(!auth() -> attempt($request->only('email','password'))){
                return back() -> with('status','Invalid login details, check your email and password (tutor)');
            }
            return redirect() -> route('dashboard');

        }
        else{
            auth() ->guard('students') -> attempt($request->only('email','password'));
            if(!auth() ->guard('students') -> attempt($request->only('email','password'))){
                return back() -> with('status','Invalid login details, check your email and password (student)');
            }
            return redirect() -> route('dashboard');
        }

    }
}
