@extends('layout.nav')

@section('content')


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


        .mainContent {
            width: 100%;
            float: right;
            height: 90vh;
            padding: 0 0 0 10px;
            box-sizing: border-box;
            justify-content: center;
        }

        .table {
            width: 100%;
            display: table;
            color: #666666;
            border-collapse: collapse;
        }

        .tr {
            display: table-row;
            color: #F28F3B;
        }

        a.tr {
            display: table-row;
            border-bottom: 1px solid #dddddd;
            color: #808080;
            text-decoration: none;
            transition: 0.2s;
        }

        a.tr:hover {
            background: #f0f0ff;
            transition: 0.2s;
        }

        .td {
            display: table-cell;
            padding: 20px;
        }

    </style>
    


    @php
    $userCurrent = Auth::guard('web');
    $student = DB::table('students')
        ->leftJoin('enroll', 'enroll.emailStudent', '=', 'students.email')
        ->leftJoin('classes', 'classes.id', '=', 'enroll.idClass')
        ->where('classes.emailTutor', $userCurrent->user()->email)
        ->whereNotNull('classes.dayOfWeek')
        ->selectRaw('students.id, students.username, students.gender, students.dob, students.phone, students.email')
        ->groupBy('students.id', 'students.username', 'students.gender', 'students.dob', 'students.phone', 'students.email')
        ->get();

    // dd($student);

    @endphp
    <div class="containerSetting">
        <div class="mainContent">
            @if ($student->count() <= 0)
                <div class="notFoundContainer"><img src="{{ URL::asset('/image/notfound.png') }}" style="width:30%;">
                    <div style="margin-bottom:15px;">
                        <h2 style="font-size:28px;color:#F28F3B;font-weight:600;">No Student Found</h2>
                    </div>
                    <div style="color:#808080;">No student enroll yet</div>
                </div>
            @else
                <div class="table">
                    <div class="tr">
                        <div class="td">No</div>
                        <div class="td">Name</div>
                        <div class="td">Gender</div>
                        <div class="td">Age</div>
                        <div class="td">Phone</div>
                        <div class="td">Email</div>
                    </div>

                    @foreach ($student as $student)
                        @php
                            $year = date('Y', strtotime($student->dob));
                        @endphp
                        <a href="#" class="submitLink tr">
                            <div class="td">{{ ++$loop->index }}</div>
                            <div class="td">{{ $student->username }}</div>
                            <div class="td">{{ $student->gender }}</div>
                            <div class="td">{{ date('Y') - $year }}</div>
                            <div class="td">{{ $student->phone }}</div>
                            <div class="td">{{ $student->email }}</div>

                            <form action="{{ route('studentDetails') }}" method="get">
                                @csrf
                                <input type="hidden" name="id" value="{{ $student->id }}">
                            </form>
                        </a>

                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <script>
        $('.submitLink').click(function() {
            $(this).find('form').submit();
        })
    </script>
@endsection
