<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SettingController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        return view('setting');
    }

    public function editDetails(Request $request)
    {   
        if (Auth::guard('students')->check()) {
            $userCurrent = Auth::guard('students');
        } 
        elseif (Auth::guard('web')->check()) {
            $userCurrent = Auth::guard('web');
        }

        // dd($emailCurrent);

        if ($request->has('changeDetails')) {

            $this->validate($request, [
                'username' => 'required',
                'gender' => 'required',
                'phone' => 'required|numeric',
                'dob' => 'required',
            ]);

            // if(($request->email) == )
            if($userCurrent == Auth::guard('web')){
                User::where('email', $userCurrent->user()->email)
                    ->update(['username' => $request -> username,
                    'gender' => $request -> gender,
                    'phone' => $request -> phone,
                    'dob' => Carbon::parse($request -> dob)
                    ]);
            }
            elseif($userCurrent == Auth::guard('students')){
                Student::where('email', $userCurrent->user()->email)
                ->update(['username' => $request -> username,
                'gender' => $request -> gender,
                'phone' => $request -> phone,
                'dob' => Carbon::parse($request -> dob)
                ]);
            }
            
            return redirect() -> route('settings');
        }
        
        if ($request->has('changePassword')) {
            // dd($userCurrent -> user() -> password);


            $validator = Validator::make($request->all(), [
                'password' => 'required',
                'newPassword' => 'required|confirmed|min:8',
                'newPassword_confirmation' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect() -> route('settingsAcc')
                            ->withErrors($validator)
                            ->withInput();
            }

            if (Hash::check($request->password, $userCurrent->user()->password)) {
                if($userCurrent == Auth::guard('web')){
                    User::where('email', $userCurrent->user()->email)
                        ->update(['password' => Hash::make($request -> newPassword)
                        ]);
                }
                elseif($userCurrent == Auth::guard('students')){
                    Student::where('email', $userCurrent->user()->email)
                        ->update(['password' => Hash::make($request -> newPassword)
                        ]);
                }
            }
            else{
                return redirect() -> route('settingsAcc') -> with('status','The password is incorrect');
            }

            return redirect() -> route('settings');
        }
    }

}
