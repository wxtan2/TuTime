<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorDetailsController extends Controller
{
    public function index()
    {
        //dd(auth() -> user());
        return view('auth.tutorDetails');
    }

    public function storeTutorDetails(Request $request)
    {   

        $this->validate($request,[
            'username' => 'required',
            'DOB' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'gender' => 'required',
        ]);



        // auth() -> attempt($request->only('email','password'));
        // return redirect() -> route('details');

    }
}
