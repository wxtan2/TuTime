<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class RegisterStudentController extends Controller
{
    public function index()
    {
        return view('auth.registerStudent');
    }

    public function storeStudent(Request $request)
    {   
        $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        $user = Student::where('email', '=', $request->email)->first();

        if ($user === null) {

            $user = Student::create([
                'email' => $request -> email,
                'password' => Hash::make($request -> password),
                'username' => "",
                'gender' => "",
                'phone' => "",
                'dob' => Carbon::parse('01/01/0001'),
            ]);

            auth() ->guard('students') -> attempt($request->only('email','password'));

            $user -> sendEmailVerificationNotification();


            return redirect() -> route('detailsStudent');

        } 
    
        else {        
            return back() -> with('status','This email already taken, please check again');

        }
    }
}
