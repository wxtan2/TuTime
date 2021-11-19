<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/nav.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>TuTime</title>
</head>

<body>
    <nav class="navBar">
        <img class="navLogo" src="{{URL::asset('/image/logo.svg')}}">
        <span class="navWord">NAVIGATION</span>
        <ul>
            <li class="list active">
                <a href="#" title="Timetable" alt="Timetable">
                    <span class="icon">
                        <ion-icon name="today-outline"></ion-icon>
                    </span>
                    <span class="title">Timetable</span>
                </a>
            </li>
            <li class="list">
                <a href="#" title="Classes" alt="Classes">
                    <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>
                    </span>
                    <span class="title">Classes</span>

                </a>
            </li>
            <li class="list">
                <a href="#" title="Students" alt="Students">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="title">Students</span>

                </a>
            </li>
            <li class="list">
                <a href="#" title="Settings" alt="Settings">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>

                </a>
            </li>
        </ul>
    </nav>
    @php
        $username = auth()->user()->username;
    @endphp
    <div class="topMenu">
        <div class="profileContainer" tabindex="1">
            <div class="topMenuItem">
                <div class="nameContainer">
                    {{ $username }}
                </div>
                <div class="imgContainer">
                    <img src="{{URL::asset('/image/profileIcon.svg')}}">
                </div>
            </div>

            <div class="logoutContainer">

                <a href="#" title="Logout" alt="Logout">
                    <img src="{{URL::asset('/image/logout.svg')}}" alt="Logout" title="Logout" style="display: flex; float: left; padding-right: 12px; ">
                    <span style="display: flex; float: right; padding-top: 4px;">Logout</span>
                </a>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(".list").on("click", function() {
                $(".navBar").find(".list").removeClass("active");
                $(this).addClass("active");
            })
        })
    </script>
    @yield('content')

</body>

</html>
