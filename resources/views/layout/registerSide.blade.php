<!DOCTYPE html>
<html lang="en">

<head>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/register.css') }}"> --}}
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
<style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Lato:wght@100;400&family=Sacramento&display=swap');
html {
    background: url('../image/login.png') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Baloo Da 2', cursive;
    font-size: 16px;
}

.welcomeCenter {
    width: 80%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.welcomeCenter img {
    position: absolute;
    width: 90px;
    top: -150px;
    left: -10px;
}

.signCenter {
    width: 72%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: left;
}

.registerContent {
    width: 800px;
    height: 530px;
    position: absolute;
    top: 50%;
    left: 50%;
    box-sizing: border-box;
    transform: scale(100%) translate(-50%, -50%);
}

.welcomeBox {
    width: 334px;
    height: 100%;
    background: rgba(242, 143, 59, 0.65);
    color: #ffffff;
    position: relative;
    float: left;
    border-radius: 15px 0 0 15px;
}

.registerBox {
    width: 466px;
    height: 100%;
    position: relative;
    background: #ffffff;
    border-radius: 0 15px 15px 0;
    float: right;
}

.welcomeWord {
    font-size: 35px;
    font-weight: 600;
}

.signInWord {
    font-size: 40px;
    font-weight: 600;
    color: #F28F3B;
    margin-bottom: 18px;
}

.signButton {
    width: 105px;
    height: 34px;
    border-radius: 18px;
    border: 1px solid #ffffff;
    align-content: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
    margin: auto;
    margin-top: 25px;
}

.signButton {
    transition: 0.2s;
    width: 110px;
    height: 34px;
    border-radius: 18px;
    border: 1px solid #ffffff;
    align-content: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
    margin: auto;
    margin-top: 25px;
}

.signButton:hover {
    transition: 0.2s;
    background-color: #ffffff;
    border: 1px solid #ffffff;
    color: #F28F3B;
}

.submitButton {
    transition: 0.2s;
    width: 110px;
    height: 34px;
    border-radius: 18px;
    background-color: #F28F3B;
    border: 1px solid #F28F3B;
    align-content: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
    margin: auto;
    margin-top: 33px;
    cursor: pointer;
}

.submitButton:hover {
    transition: 0.2s;
    background-color: #F0A769;
    border: 1px solid #F0A769;
}

.userSelect {
    color: #cccccc;
}

.userSelect a {
    color: #cccccc;
    text-decoration: none;
    font-weight: 600;
}

.userSelect a:hover,
.userSelect a.selected {
    color: #F28F3B;
}

.textContainer {
    position: relative;
}

.textContainer label {
    position: absolute;
    width: 20px;
    height: 20px;
    bottom: 13px;
    left: 13px;
    border: none;
}

.textContainer label img {
    width: 20px;
}

.textContainer input {
    width: 289px;
    top: 2px;
    right: 0px;
    width: 100%;
    height: 45px;
    border: 1px solid #cccccc;
    border-radius: 7px;
    margin-top: 20px;
    padding-left: 45px;
    box-sizing: border-box;
    outline: 0;
}

.textContainer input:focus {
    border: 1px solid #F0A769;
}

.textContainer input:focus+label svg path {
    fill: #F0A769;
}

.errorMessage {
    color: #ff0000;
    font-size: 14px;
}

.errorBorder {
    border: 1px solid #ff0000!important;
}

.textboxPlain {
    width: 100%;
    height: 45px;
    border: 1px solid #cccccc;
    border-radius: 7px;
    margin-top: 20px;
    position: relative;
    outline: 0px;
    padding-left: 10px;
    box-sizing: border-box;
}

.textboxPlain:focus {
    border: 1px solid #F28F3B;
}


/* The container */

.container {
    display: block;
    position: relative;
    padding-left: 35px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}


/* Hide the browser's default radio button */

.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}


/* Create a custom radio button */

.checkmark {
    position: absolute;
    top: -3px;
    left: 0;
    height: 24px;
    width: 24px;
    border: 1px solid #000;
    background-color: transparent;
    border-radius: 50%;
}

.container input:checked~.checkmark {
    border: 1px solid #ff6600;
}


/* Create the indicator (the dot/circle - hidden when not checked) */

.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}


/* Show the indicator (dot/circle) when checked */

.container input:checked~.checkmark:after {
    display: block;
}


/* Style the indicator (dot/circle) */

.container .checkmark:after {
    top: 5px;
    left: 5px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #ff6600;
}

@media screen and (min-width: 1400px) {
    .registerContent {
        transform-origin: top left;
        transform: scale(125%) translate(-50%, -50%);
    }
}
    </style>
</html>
