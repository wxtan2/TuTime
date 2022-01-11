<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentClassController extends Controller
{
    public function index(Request $request)
    {
        return view('student.studentClass');
    }
}
