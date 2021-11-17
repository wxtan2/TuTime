<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorDetailsController extends Controller
{
    public function index()
    {
        return view('auth.tutorDetails');
    }
}
