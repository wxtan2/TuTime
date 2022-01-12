@extends('layout.registerSide')

@section('content')
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
            border: 1px solid #ff0000 !important;
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
    <div class="registerBox">
        <div class="signCenter">
            <div class="signInWord" style="margin-bottom: -20px;">Create Account</div>
            <span style="font-size:20px;color:#F28F3B"><b>Student</b></span>
            <div class="formContainer">

                <div>
                    <form action="{{ route('detailsStudent') }}" method="post">
                        @csrf

                        <input class="textboxPlain @error('username') errorBorder @enderror" type="text" id="username"
                            placeholder="Given Name" name="username" value="{{ old('username') }}">
                        @error('username')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div style="margin-top:10px">
                            <label for="DOB" style="font-size:16px">Date of Birth</label><br>
                            <input class="textboxPlain @error('DOB') errorBorder @enderror" type="date" id="DOB"
                                placeholder="DD / MM /YYYY" name="DOB" value="{{ old('DOB') }}"
                                style="margin-top:0px;padding-right:10px">
                        </div>
                        @error('DOB')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <input class="textboxPlain @error('phone') errorBorder @enderror" type="text" id="phone"
                            placeholder="Mobile Phone" name="phone" value="{{ old('phone') }}" style="margin-top:20px;">
                        @error('phone')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div style="margin-top:30px;">
                            <table cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                                <tr>
                                    <td style="padding-right:33px;width:65px;">Gender</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                                            <tr>
                                                <td>
                                                    <label class="container">Male
                                                        <input type="radio" checked="checked" value="male" name="gender">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="container">Female
                                                        <input type="radio" value="female" name="gender">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button class="submitButton" type="submit" title="Submit" alt="Submit">SIGN UP</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
