@extends('layout.nav')

@section('content')

    @php
    $id = request()->get('id');
    $userCurrent = Auth::guard('students');
    $student = DB::table('students')
        ->where('id', $id)
        ->first();

    @endphp

    <div class="containerSetting">
        <div class="studentDetailsContent">
                
            <table class="studentDetailsTable">
                <tr>
                    <td style="vertical-align: top;padding:0px;">
                        <img src="{{ URL::asset('/image/Persona.svg') }}" draggable="false" style="width:130px;">
                    </td>
                    <td >
                        <h2 style="font-size: 28px; font-weight:600;">{{ $student->username }}</h2>
                        
                        <div></div>
                    </td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ date('Y') - date('Y', strtotime($student->dob)) }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $student->gender }}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><a href="tel:{{ $student->phone }}">{{ $student->phone }}</a></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><a href="email:{{ $student->email }}">{{ $student->email }}</a></td>
                </tr>
                <tr>
                    <td>Date if Birth</td>
                    <td>{{ $student->dob }}</td>
                </tr>
            </table>
            <hr>

        </div>
    </div>

    <style>
        hr {
            border-top: 1px solid #ccc;
            margin: 20px;
        }

        .containerSetting {
            width: calc(100% - 13.54vw);
            float: right;
            margin-top: 45px;
            box-sizing: border-box;
            position: relative;
            height: calc(100vh - 45px);
            color: #808080;
        }

        #student {
            background: #ffffff;
        }

        #student ul li.active a {
            color: #E87247;
        }

        .studentDetailsContent {
            max-width: 1000px;
            margin: auto;
            width: 100%;
            position: relative;
            margin-top: 25px;
        }

        .studentDetailsTable {
        }

        .studentDetailsTable td{
            padding: 12px 20px;
        }

        .studentDetailsTable tr td:first-child{
            text-align: right
        }
        
        .studentDetailsTable a{
            text-decoration: none;
            color:#808080;
        }

        .studentDetailsTable a:hover{
            color:#E87247;
        }

    </style>
    <script>
        $(document).ready(function() {
            $(".navBar").find('[data-menu = student]').addClass("active");

        })
    </script>

@endsection
