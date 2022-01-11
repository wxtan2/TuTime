<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class studentEnrollController extends Controller
{   

    public function index()
    {   
        $classes = DB::table('classes')
        ->join('users', 'classes.emailTutor', '=', 'users.email')
        ->whereNotNull('classes.dayOfWeek')
        ->whereNotIn('classes.id', $this->getEnrolled())
        ->select('users.username', 'classes.*')->get();

        $daySend = "any";
        $cataSend = "any";
        $searchText = null;
        return view('student.studentEnroll',['classes'=>$classes])->with('day', $daySend)->with('cata', $cataSend)->with('searchText', $searchText);
    }

    public function func(Request $request)
    {
        $emailStudent = Auth::guard('students')->user()->email;

        if($request->type == "search"){

            $getDayofWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thusday', 'Friday', 'Saturday'];
            $day = array_search($request->day, $getDayofWeek);

            if($request->day == "any"){
                if($request->category == "any"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where(function($query)use($request)  {
                        $query->orWhere('classes.className','like', '%'.$request->searchText.'%')
                        ->orWhere('classes.subject','like', '%'.$request->searchText.'%')
                        ->orWhere('classes.dayOfWeek','like', '%'.$request->searchText.'%')
                        ->orWhere('users.username','like', '%'.$request->searchText.'%');
                    })
                    ->select('users.username', 'classes.*')->get();

                }

                if($request->category == "classname"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('classes.className','like', '%'.$request->searchText.'%')
                    ->select('users.username', 'classes.*')->get();

                }

                if($request->category == "subject"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('classes.subject','like', '%'.$request->searchText.'%')
                    ->select('users.username', 'classes.*')->get();

                }

                if($request->category == "teacher"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('users.username','like', '%'.$request->searchText.'%')
                    ->select('users.username', 'classes.*')->get();
                }
            }
            else{
                if($request->category == "any"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('dayOfWeek', $day)
                    ->where(function($query)use($request)  {
                        $query->orWhere('classes.className','like', '%'.$request->searchText.'%')
                        ->orWhere('classes.subject','like', '%'.$request->searchText.'%')
                        ->orWhere('classes.dayOfWeek','like', '%'.$request->searchText.'%')
                        ->orWhere('users.username','like', '%'.$request->searchText.'%');
                    })
                    ->select('users.username', 'classes.*')->get();

                }

                if($request->category == "classname"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('dayOfWeek', $day)
                    ->where('classes.className','like', '%'.$request->searchText.'%')
                    ->select('users.username', 'classes.*')->get();
                }

                if($request->category == "subject"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('dayOfWeek', $day)
                    ->where('classes.subject','like', '%'.$request->searchText.'%')
                    ->select('users.username', 'classes.*')->get();
                }

                if($request->category == "teacher"){
                    $classes = DB::table('classes')
                    ->join('users', 'classes.emailTutor', '=', 'users.email')
                    ->whereNotNull('classes.dayOfWeek')
                    ->whereNotIn('classes.id', $this->getEnrolled())
                    ->where('dayOfWeek', $day)
                    ->where('users.username','like', '%'.$request->searchText.'%')
                    ->select('users.username', 'classes.*')->get();
                }
            }

            $daySend = $request->day;
            $cataSend = $request->category;
            $searchText = $request->searchText;
            return view('student.studentEnroll',['classes'=>$classes])->with('day', $daySend)->with('cata', $cataSend)->with('searchText', $searchText);
            
        }

        if($request->type == "enroll"){
            DB::table('enroll') 
            -> insert([
                        'idClass' => $request->classid,
                        'emailStudent' => $emailStudent
                    ]);

                    return redirect()->back();
        }

    }

    public static function getEnrolled(){
        $userCurrent = Auth::guard('students');

        $classesEnrolled = DB::table('classes')
        ->join('enroll', 'classes.id', '=', 'enroll.idClass')
        ->where('enroll.emailStudent', $userCurrent->user()->email)
        ->select('classes.id')->get();

        if($classesEnrolled->count() <= 0){
            $arr[] = 0;
        }

        foreach($classesEnrolled as $row)
        {
            $arr[] = (array) $row;
        }

        return $arr;
    }

}
