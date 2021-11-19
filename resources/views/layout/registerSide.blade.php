<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/register.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>TuTime</title>
</head>

<body>
    <div class="registerContent">
        <div class="welcomeBox">
            <div class="welcomeCenter">
                <a href="{{'/'}}"><img src="{{URL::asset('/image/logo.svg')}}" title="TuTime" alt="TuTime"></a>

                <div class="welcomeWord">Welcome Back</div>
                <div>Already have an account? Log in to keep connect between tutor and student</div>
                <a class="signButton" title="Sign In Now" alt="Sign In Now" href="{{ route('login') }}">SIGN IN</a>
            </div>
        </div>

        @yield('content')

    </div>
</body>

</html>
