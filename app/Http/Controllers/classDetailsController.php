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
        
        else if($request -> type == "deleteNote"){

            DB::table('notes')
            ->where('id', '=', $request -> noteIdDelete)
            ->delete();
            
            return redirect()->back();
        }


        else if($request -> type == "editNote"){

            DB::table('notes')
            ->where('id', '=', $request -> noteIdEdit)
            ->update(['title' => $request -> title,
                'content' => $request -> noteEdit
                ]);
            
            return redirect()->back();
        }


        

    }
}
