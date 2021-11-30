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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">



    <title>TuTime</title>
</head>

<body>
    <nav class="navBar">
        <img class="navLogo" src="{{ URL::asset('/image/logo.svg') }}">
        <span class="navWord">NAVIGATION</span>
        <ul>
            <li class="list" data-menu="timetable">
                <a href="#" title="Timetable" alt="Timetable">
                    <span class="icon">
                        <ion-icon name="today-outline"></ion-icon>
                    </span>
                    <span class="title">Timetable</span>
                </a>
            </li>
            <li class="list" data-menu="classes">
                <a href="#" title="Classes" alt="Classes">
                    <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>
                    </span>
                    <span class="title">Classes</span>

                </a>
            </li>
            <li class="list" data-menu="students">
                <a href="#" title="Students" alt="Students">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="title">Students</span>

                </a>
            </li>
            <li class="list" data-menu="settings">
                <a href="{{route('settings')}}" data="Settings" alt="Settings">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>

                </a>
            </li>
        </ul>
    </nav>
    @php
        $username = 'Guest';
        $userEmail = 'null';
        if (Auth::guard('students')->check()) {
            $username = Auth::guard('students')->user()->username;
            $userEmail = Auth::guard('students')->user()->email;
        } elseif (Auth::guard('web')->check()) {
            $username = Auth::guard('web')->user()->username;
            $userEmail = Auth::guard('web')->user()->email;
        }
    @endphp

    <div class="topMenu">
        <div class="profileContainer" tabindex="1">
            <div class="topMenuItem">
                <div class="nameContainer">
                    {{ $username }}
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
                $(".navBar").find('[data-menu='+path+']').addClass("active");
                
        })
    </script>
    @yield('content')

</body>

</html>
