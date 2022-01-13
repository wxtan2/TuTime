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
    width: 800px;
    height: 100%;
    position: relative;
    background: #ffffff;
    border-radius: 15px;
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
    border: 1px solid #F28F3B;
    align-content: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #F28F3B;
    margin: auto;
    background-color: #ffffff;
    margin-top: 15px;
    cursor: pointer;
}

.signButton:hover {
    transition: 0.2s;
    background-color: #F28F3B;
    border: 1px solid #F28F3B;
    color: #ffffff;
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

.alert-success{
    background: #00bc86;
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 20px;
    color: #ffffff;
    border-radius: 10px;
}

@media screen and (min-width: 1400px) {
    .registerContent {
        transform-origin: top left;
        transform: scale(125%) translate(-50%, -50%);
    }
}
    </style>
<body>
    <div class="registerContent">
        {{-- <div class="welcomeBox">
            <div class="welcomeCenter">
                <a href="{{'/'}}"><img src="{{URL::asset('/image/logo.svg')}}" title="TuTime" alt="TuTime"></a>

                <div class="welcomeWord">Welcome Back</div>
                <div>Already have an account? Log in to keep connect between tutor and student</div>
                <a class="signButton" title="Sign In Now" alt="Sign In Now" href="{{ route('login') }}">SIGN IN</a>
            </div>
        </div> --}}

        <div class="registerBox" >
            <div class="signCenter" style="text-align: center">
                <img src="{{URL::asset('/image/emailverification.png')}}" style="width:25%" title="TuTime" alt="TuTime">
                <div class="signInWord" style="margin-bottom: 20px;">Verify Your Email</div>
                <div class="formContainer">
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
        
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="submitButton" style="width: 100%">{{ __('Click here to request another') }}</button>
                        </form>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button  class="signButton" title="Logout" alt="Logout" style="width: 100%">Back to Login</button>
                        </form>
                    </div>               
        
                </div>
            </div>
        </div>

    </div>
</body>

</html>



