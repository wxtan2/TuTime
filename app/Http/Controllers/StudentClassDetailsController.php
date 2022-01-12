<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentClassDetailsController extends Controller
{   


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    
    public function index()
    {   
        // $classes = DB::table('classes')
        // ->join('users', 'classes.emailTutor', '=', 'users.email')
        // ->whereNotNull('classes.dayOfWeek')
        // ->whereNotIn('classes.id', $this->getEnrolled())
        // ->select('users.username', 'classes.*')->get();

        // $daySend = "any";
        // $cataSend = "any";
        // $searchText = null;
        return view('tutor.tutorStudentDetails');
    }
}
