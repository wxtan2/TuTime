<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'phone' => 'required|regex:/(01)[0-9]{8,9}/',
            'gender' => 'required',
        ]);

        User::where('email', auth() -> user() -> email)
                ->update(['username' => $request -> username,
                'gender' => $request -> gender,
                'phone' => $request -> phone,
                'dob' => Carbon::parse($request -> DOB)
                ]);

        return redirect() -> route('dashboard');

    }
}
