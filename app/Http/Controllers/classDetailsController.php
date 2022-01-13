<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class classDetailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web,students');
    }
    
    
    public function index(Request $request)
    {   
        
        // $userCurrent = Auth::guard('web');

        $classes = DB::table('classes')
        ->leftJoin('users', 'classes.emailTutor', '=', 'users.email')
        ->where('classes.id', $request->id)
        ->first();

        return view('tutor.tutorClassDetails',['classes'=>$classes]);
    }

    public function func(Request $request)
    {   
        if($request -> type == "createNote"){

            $this->validate($request, [
                'title' => 'required',
                'note' => 'required'
            ]);

            DB::table('notes')
            -> insert([
                        'title' => $request->title,
                        'content' => $request->note,
                        'idClass' => $request->id
                    ]);

            return redirect()->back();
        }
        // $request->session()->put('id', $request -> id);
        // $id = $request->session()->get('id');
        
        // dd($id);

        // return view('tutor.tutorClassDetails');
    }
}
