<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/nav.css') }}">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/moment@2.27.0/min/moment.min.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />



    <title>TuTime</title>
</head>

<body>

    <nav class="navBar">
        @php
            if (Auth::guard('students')->check()) {
                $userCurrent = Auth::guard('students');
                $userType = 'Student';
            } elseif (Auth::guard('web')->check()) {
                $userCurrent = Auth::guard('web');
                $userType = 'Tutor';
            }
            
        @endphp

        <div style="
                position: absolute;
                color: #fb761a;
                right: 2vw;
                top: 4.7vw;
                text-align: right;
                padding: 0px 10px;
                align-items: center;
                border-radius: 100px;
                height: 25px;
                display: flex;
                box-sizing: border-box;
                background: #ffffff;
                ">
            {{ $userType }}

        </div>


        <img class="navLogo" src="{{ URL::asset('/image/logo.svg') }}">
        <span class="navWord">NAVIGATION</span>
        <ul>
            <li class="list" data-menu="dashboard">
                <a href="{{ route('dashboard') }}" title="Timetable" alt="Timetable">
                    <span class="icon">
                        <ion-icon name="today-outline"></ion-icon>
                    </span>
                    <span class="title">Timetable</span>
                </a>
            </li>

            @if (Auth::guard('students')->check())
                <li class="list" data-menu="class">
                    <a href="{{ route('classStudent') }}" title="Class" alt="Class">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Classes</span>
                    </a>
                </li>
                <li class="list" data-menu="enroll">
                    <a href="{{ route('enrollStudent') }}" title="Enroll" alt="Enroll">
                        <span class="icon">
                            <ion-icon name="add-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Enroll</span>
                    </a>
                </li>
            @endif


            @if (Auth::guard('web')->check())
                <li id="classes" class="list" data-menu="classes">
                    <a href="{{ route('classes') }}" title="Classes" alt="Classes">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Classes</span>
                    </a>
                </li>
                <li id="student" class="list" data-menu="student">
                    <a href="{{ route('student') }}" title="Student" alt="Student">
                        <span class="icon">
                            <ion-icon name="school-outline"></ion-icon>
                        </span>
                        <span class="title">Student</span>
                    </a>
                </li>
            @endif
            <li class="list" data-menu="settings">
                <a href="{{ route('settings') }}" data="Settings" alt="Settings">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>

                </a>
            </li>
        </ul>
    </nav>


    <div class="topMenu">
        {{-- <div style="
        position: absolute;
        color: #ffffff;
        right: 200px;
        top: 5px;
        text-align: right;
        border: 1px solid #fb761a;
        padding: 0px 20px;
        align-items: center;
        border-radius: 109px;
        height: 35px;
        background:linear-gradient(90deg, #FF6600 11.34%, #F0A769 87.65%, #F28F3B 100%);
        display: flex;
        box-sizing: border-box;">
            {{ $userType }}

        </div> --}}
        <div class="profileContainer" tabindex="1">
            <div class="topMenuItem">
                <div class="nameContainer">
                    {{ $userCurrent->user()->username }}
                </div>
                <div class="imgContainer">
                    <img src="{{ URL::asset('/image/profileIcon.svg') }}">
                </div>
            </div>

            <div class="logoutContainer">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button title="Logout" alt="Logout">
                        <img src="{{ URL::asset('/image/logout.svg') }}" alt="Logout" title="Logout"
                            style="display: flex; float: left; padding-right: 12px; ">
                        <span style="display: flex; float: right; padding-top: 4px;">Logout</span>
                </form>
                </a>
            </div>
        </div>
    </div>


    {{-- <script>
        $(document).ready(function() {
            $(".list").on("click", function() {
                $(".navBar").find(".list").removeClass("active");
                $(this).addClass("active");
            })
        })
    </script> --}}

    <script>
        $(document).ready(function() {
            var path = window.location.pathname.split("/").pop();
            $(".navBar").find('[data-menu=' + path + ']').addClass("active");

        })
    </script>
    @yield('content')

</body>

</html>
