<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentDetailsController extends Controller
{   
    
    public function index()
    {
        //dd(auth() -> user());

       
        return view('auth.studentDetails');
    }

    public function storeStudentDetails(Request $request)
    {   
        // dd(auth() -> student());

        $this->validate($request,[
            'username' => 'required',
            'DOB' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{8,9}/',
            'gender' => 'required',
        ]);

        Student::where('email', auth() -> guard('students') -> user()-> email)
                ->update(['username' => $request -> username,
                'gender' => $request -> gender,
                'phone' => $request -> phone,
                'dob' => Carbon::parse($request -> DOB)
                ]);

                return redirect() -> route('dashboard');

    }
}
