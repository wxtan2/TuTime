<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
            $data = Event::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);
 
            return response()->json($data);
       }
 
        return view('tutor.tutorTB');
    }
 
    public function ajax(Request $request)
    {

        switch ($request->type) {
           case 'add':

            if (Auth::guard('students')->check()) {
                $userCurrent = Auth::guard('students');
            } 
            elseif (Auth::guard('web')->check()) {
                $userCurrent = Auth::guard('web');
            }

            // $this->validate($request, [
            //     'title' => 'required',
            //     'description' => 'required',
            //     'dayOfWeek' => 'required',
            //     'startTime' => 'required',
            //     'endTime' => 'required',
            //     'backgroundColor' => 'required',
            // ]);
            if($request->eventTypeAdd == 'event'){
                if($userCurrent == Auth::guard('web')){
                    DB::table('events')
                    -> insert([
                        'title' => $request->title,
                        'description' => $request->description,
                        'dayOfWeek' =>$request->dayOfWeek,
                        'startTime' => $request->startTime,
                        'endTime' => $request->endTime,
                        'backgroundColor' => $request->backgroundColor,
                        'emailTutor' => $request->email
                    ]);

                }
                elseif($userCurrent == Auth::guard('students')){
                    DB::table('events')
                    -> insert([
                        'title' => $request->title,
                        'description' => $request->description,
                        'dayOfWeek' => $request->dayOfWeek,
                        'startTime' => $request->startTime,
                        'endTime' => $request->endTime,
                        'backgroundColor' => $request->backgroundColor,
                        'emailStudent' => $request->email
                    ]);
                }
            }
            elseif($request->eventTypeAdd == 'classTutor'){
                DB::table('classes')
                -> insert([
                    'className' => $request->title,
                    'subject' => $request->description,
                    'dayOfWeek' => $request->dayOfWeek,
                    'startTime' => $request->startTime,
                    'endTime' => $request->endTime,
                    'backgroundColor' => $request->backgroundColor,
                    'emailTutor' => $request->email
                ]);
            }
            
            return redirect() -> route('dashboard');
            break;

  
           case 'update':

            if($request->eventType == 'event'){
                DB::table('events')
                -> where('id', $request->id)
                -> update([
                    'startTime' => $request->startTime,
                    'endTime' => $request->endTime,
                    'dayOfWeek' => $request->dayOfWeek
                ]);
            }
            elseif($request->eventType == 'classTutor'){
                DB::table('classes')
                -> where('id', $request->id)
                -> update([
                    'startTime' => $request->startTime,
                    'endTime' => $request->endTime,
                    'dayOfWeek' => $request->dayOfWeek
                ]);
            }
            break;

            case 'updateDetails':

                if($request->eventType == 'event'){
                    DB::table('events')
                    -> where('id', $request->id)
                    -> update([
                        'title' => $request->titleUpdate,
                        'description' => $request->descriptionUpdate,
                        'dayOfWeek' => $request->dayOfWeekUpdate,
                        'backgroundColor' => $request->backgroundColorUpdate,
                        'startTime' => $request->startTimeUpdate,
                        'endTime' => $request->endTimeUpdate,
                    ]);
                }
                elseif($request->eventType == 'classTutor'){
                    DB::table('classes')
                    -> where('id', $request->id)
                    -> update([
                        'className' => $request->titleUpdate,
                        'subject' => $request->descriptionUpdate,
                        'dayOfWeek' => $request->dayOfWeekUpdate,
                        'backgroundColor' => $request->backgroundColorUpdate,
                        'startTime' => $request->startTimeUpdate,
                        'endTime' => $request->endTimeUpdate,
                    ]);
                }
                return redirect() -> route('dashboard');
                break;
  
           case 'delete':
            if($request->eventTypeDel == 'event'){
                DB::table('events')
                -> where('id', $request->idDel)
                -> delete();
  
            }
            elseif($request->eventTypeDel == 'classTutor'){
                DB::table('classes')
                -> where('id', $request->idDel)
                -> delete();

            }
             
            return redirect() -> route('dashboard');
             break;
             
           default:
             # code...
             break;
        }
    }
}