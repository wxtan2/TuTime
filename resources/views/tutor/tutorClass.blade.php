@extends('layout.nav')

@section('content')

    @php
    $userCurrent = Auth::guard('web');
    $classes = DB::table('classes')
        ->where('emailTutor', $userCurrent->user()->email)
        ->get();

    $getDayofWeek = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thusday", "Friday", "Saturday");

    function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%h h %i min');
}
    @endphp
    <div class="containerSetting">
        <div class="mainContent">
            <table class="classTable">
                <tr style="color:#F28F3B;">
                    <td>No</td>
                    <td>Class Name</td>
                    <td>Subject</td>
                    <td>Day</td>
                    <td>Start Time</td>
                    <td>End Time</td>
                    <td>Duration</td>
                    <td>Students</td>
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
                        <td></td>
                        <td>
                            <input type="hidden" value="{{$classes->id}}">
                            <input type="submit" class="viewButton" value="">
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <style>
        .containerSetting {
            width: calc(100% - 13.54vw);
            display: flex;
            float: right;
            margin-top: 55px;
            height: 90vh;
            padding: 15px;
            box-sizing: border-box;
        }

        .mainContent {
            width: 100%;
            display: flex;
            float: right;
            height: 90vh;
            padding: 0 0 0 10px;
            box-sizing: border-box;
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
            padding: 8px;
            background-image: url('/image/View.png');
            background-position: center;
            background-size: 40px;
            background-repeat: no-repeat;
            border-radius: 10px;
            vertical-align: middle;
        }

    </style>

@endsection
