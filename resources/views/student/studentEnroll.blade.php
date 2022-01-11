@extends('layout.nav')

@section('content')
    @php
    $userCurrent = Auth::guard('students');
    // $classes = DB::table('classes')
    //     ->join('users', 'classes.emailTutor', '=', 'users.email')
    //     ->whereNotNull('classes.dayOfWeek')
    //     ->get();

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
            <form action="{{ route('enrollStudent') }}" method="post">
                @csrf
                <div class="SearchContainer">
                    <select name="day" text="1234">
                        <option value="any" @if ($day == 'any') selected @endif>Any Day</option>
                        <option value="Sunday" @if ($day == 'Sunday')  selected  @endif>Sunday</option>
                        <option value="Monday" @if ($day == 'Monday')  selected  @endif>Monday</option>
                        <option value="Tuesday" @if ($day == 'Tuesday')  selected  @endif>Tuesday</option>
                        <option value="Wednesday" @if ($day == 'Wednesday')  selected  @endif>Wednesday</option>
                        <option value="Thusday" @if ($day == 'Thusday')  selected  @endif>Thusday</option>
                        <option value="Friday" @if ($day == 'Friday')  selected  @endif>Friday</option>
                        <option value="Saturday" @if ($day == 'Saturday')  selected  @endif>Saturday</option>
                    </select>

                    <div class="SearchTextContainer" style="margin-left: 15px;">
                        <input type="text" name="searchText" placeholder="Search" value="{{ $searchText }}">
                        <label for="searchText">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_185_37)">
                                    <path
                                        d="M17.7801 16.7196L12.6614 11.6009C13.6529 10.3762 14.2498 8.81991 14.2498 7.12494C14.2498 3.19648 11.0534 0 7.12491 0C3.19645 0 0 3.19645 0 7.12491C0 11.0534 3.19648 14.2498 7.12494 14.2498C8.81991 14.2498 10.3762 13.6529 11.6009 12.6614L16.7196 17.7801C16.8658 17.9263 17.0578 17.9998 17.2498 17.9998C17.4419 17.9998 17.6339 17.9263 17.7801 17.7801C18.0733 17.4868 18.0733 17.0128 17.7801 16.7196ZM7.12494 12.7499C4.02296 12.7499 1.5 10.2269 1.5 7.12491C1.5 4.02293 4.02296 1.49996 7.12494 1.49996C10.2269 1.49996 12.7499 4.02293 12.7499 7.12491C12.7499 10.2269 10.2269 12.7499 7.12494 12.7499Z" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_185_37">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </label>
                    </div>
                    <select name="category" style="border-radius: 0px; border-left:1px solid #808080">
                        <option value="any" @if ($cata == 'any') selected @endif>Any</option>
                        <option value="classname" @if ($cata == 'classname') selected @endif>Class Name</option>
                        <option value="subject" @if ($cata == 'subject') selected @endif>Subject</option>
                        <option value="teacher" @if ($cata == 'teacher') selected @endif>Teacher</option>
                    </select>
                    <button type="submit">Search</button>
                    <input type="hidden" name="type" value="search">
                </div>
            </form>
            @if ($classes->count() <= 0)
                <div class="notFoundContainer"><img src="{{ URL::asset('/image/notfound.png') }}" draggable="false"
                        style="width:30%;">
                    <div style="margin-bottom:15px;">
                        <h2 style="font-size:28px;color:#F28F3B;font-weight:600;">No Class Found</h2>
                    </div>
                    <div style="color:#808080;">Try Another Keyword</div>
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
                        <td>Teacher</td>
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
                            <td>{{ $classes->username }}</td>
                            <td>
                                <form class="enrollForm" action="{{ route('enrollStudent') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="enroll">
                                    <input type="hidden" name="classid" value="{{ $classes->id }}">
                                    <button type="submit" class="enrollButton" title="Enroll into This Class">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
    <script>
        $(".enrollButton").click(function(event) {
            event.preventDefault();
            var form = $(this).parents(".enrollForm");
            swal({
                    title: "Enroll into this class?",
                    icon: "info",
                    buttons: true,
                })
                .then(function(willDelete) {
                    if (willDelete) {
                        $(form).submit();
                    }
                });
        })
    </script>
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
            /* justify-content: center; */
            flex-direction: column;

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

        .enrollButton {
            width: 45px;
            height: 45px;
            background-image: url('{{ URL::asset('/image/add-user copy.svg') }}');
            background-position: center;
            background-size: 30px;
            background-repeat: no-repeat;
            border-radius: 10px;
            vertical-align: middle;
            outline: 0px;
            border: 1px solid #808080;
            cursor: pointer;
        }

        .enrollButton:hover {
            border: 1px solid #F28F3B;
            background-color: #ffe5ce;
            cursor: pointer;
            background-image: url('{{ URL::asset('/image/add-user.svg') }}');
        }

        .SearchContainer {
            display: flex;
            float: right;
            padding-right: 15px;
            position: relative;
        }

        .SearchContainer input {
            color: #808080 !important;
            width: 200px;
            outline: 0;
            height: 38px;
            padding-left: 40px;
            box-sizing: border-box;
            border: 1px solid transparent;
            background: #F1F3FA;
            border-radius: 5px 0 0 5px;

        }

        .SearchContainer input:focus {
            color: #808080 !important;
        }

        .SearchContainer button {
            outline: 0;
            height: 38px;
            width: 75px;
            box-sizing: border-box;
            color: #ffffff;
            border: 0px;
            margin-left: -1px;
            background: #F28F3B;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .SearchContainer label {
            position: absolute;
            width: 20px;
            height: 20px;
            bottom: 8px;
            left: 10px;
            border: none;
        }

        .SearchTextContainer {
            position: relative;
        }

        .SearchContainer input+label svg path {
            fill: #808080;
        }

        .SearchContainer input:focus {
            border: 1px solid #F0A769;
        }

        .SearchContainer input:focus+label svg path {
            fill: #F0A769;
        }

        .SearchContainer select {
            outline: 0px;
            background: #F1F3FA;
            border-radius: 5px;
            padding: 0 8px;
            border: 1px solid transparent;
            color: #808080 !important;
            position: relative;
        }

        .SearchContainer select:focus {
            border: 1px solid #F0A769;
        }

    </style>

@endsection
