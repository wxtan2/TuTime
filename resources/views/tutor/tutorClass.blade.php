@extends('layout.nav')

@section('content')

    <style>
        .numberEnroll {
            font-size: 32px;
            font-weight: 600;
            text-align: center;
            color: #F28F3B;
        }

        .containerSetting {
            width: calc(100% - 13.54vw);
            display: flex;
            float: right;
            margin-top: 55px;
            height: 90vh;
            padding: 15px;
            box-sizing: border-box;
        }

        .notFoundContainer {
            text-align: center;
        }

        .notfoundLink {
            color: #808080;
            text-decoration: none;
        }

        .notfoundLink:hover {
            text-decoration: underline;
        }

        .mainContent {
            width: 100%;
            display: flex;
            float: right;
            height: 90vh;
            padding: 0 0 0 10px;
            box-sizing: border-box;
            justify-content: center;
        }

        .classTable {
            width: 100%;
            height: fit-content;
            color: #666666;
            table-layout: auto !important;
            border-collapse: separate;
            border-spacing: 0px 8px;
        }

        .classTable tr {
            height: 65px;
        }

        .classTable tr:nth-child(n+2) {

            border-radius: 10px;
            box-shadow: 0px 4px 35px rgba(154, 161, 171, 0.15);
            background: #ffffff;
        }

        .classTable tr td {
            border: 0px;
            padding: 0 0 0 20px;
        }

        .classTable tr td:first-child {
            border-top-left-radius: 5px;
        }

        .classTable tr td:last-child {
            border-top-right-radius: 5px;
        }

        .classTable tr td:first-child {
            border-bottom-left-radius: 5px;
        }

        .classTable tr td:last-child {
            border-bottom-right-radius: 5px;
        }

        .viewButton {
            width: 45px;
            height: 45px;
            display: flex;
            background-image: url('{{ URL::asset('/image/eye 1.svg') }}');
            background-position: center;
            background-size: 30px;
            background-repeat: no-repeat;
            border-radius: 10px;
            vertical-align: middle;
            outline: 0px;
            border: 1px solid #aaaaaa;
            cursor: pointer;
        }

        .viewButton:hover {
            border: 1px solid #F28F3B;
            background-color: #ffe5ce;
            cursor: pointer;
            background-image: url('{{ URL::asset('/image/eye 1 copy.svg') }}');
        }

    </style>
    @php
    $userCurrent = Auth::guard('web');
    $classes = DB::table('classes')
        ->leftJoin('enroll', 'classes.id', '=', 'enroll.idClass')
        ->where('classes.emailTutor', $userCurrent->user()->email)
        ->whereNotNull('classes.dayOfWeek')
        ->selectRaw('classes.id, classes.className, classes.subject, classes.dayOfWeek, classes.startTime, classes.endTime, count(enroll.idClass) as numberEnroll')
        ->groupBy('classes.id', 'classes.className', 'classes.subject', 'classes.dayOfWeek', 'classes.startTime', 'classes.endTime')
        ->get();

    //  $numberEnrolled = DB::table('enroll')
    //     ->join('classes', 'enroll.idClass', '=', 'classes.id')
    //     ->where('classes.emailTutor', $userCurrent->user()->email)
    //     ->whereNotNull('classes.dayOfWeek')
    //     ->slect();

    $getDayofWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thusday', 'Friday', 'Saturday'];

    function secondsToTime($seconds)
    {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%h h %i min');
    }
    @endphp
    <div class="containerSetting">
        <div class="mainContent">
            @if ($classes->count() <= 0)
                <div class="notFoundContainer"><img src="{{ URL::asset('/image/notfound.png') }}" style="width:60%;">
                    <div style="margin-bottom:15px;">
                        <h2 style="font-size:28px;color:#F28F3B;font-weight:600;">No Class Found</h2>
                    </div>
                    <div><a class="notfoundLink" href="{{ route('dashboard') }}" style="color:#808080;">Add Class in Your
                            Timetable</a></div>
                </div>
            @else
                <table class="classTable">
                    <tr style="color:#F28F3B;">
                        <td>No</td>
                        <td>Class Name</td>
                        <td>Subject</td>
                        <td>Day</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Duration</td>
                        <td style="text-align: center;">Students</td>
                        <td></td>
                    </tr>
                    @foreach ($classes as $classes)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $classes->className }}</td>
                            <td>{{ $classes->subject }}</td>
                            <td>{{ $day = $getDayofWeek[$classes->dayOfWeek] }}</td>
                            <td>{{ $classes->startTime }}</td>
                            <td>{{ $classes->endTime }}</td>
                            <td>{{ secondsToTime(strtotime($classes->endTime) - strtotime($classes->startTime)) }}</td>
                            <td class="numberEnroll">{{ $classes->numberEnroll }}</td>
                            <td>
                                <form action="/classes/details" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $classes->id }}">
                                    <button type="submit" class="viewButton" value=""></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>


@endsection
