@extends('layout.nav')

@section('content')
    @php
    $username = 'Guest';
    $userEmail = 'null';
    if (Auth::guard('students')->check()) {
        $username = Auth::guard('students')->user()->username;
        $userEmail = Auth::guard('students')->user()->email;
        $userPhone = Auth::guard('students')->user()->phone;
        $userGender = Auth::guard('students')->user()->gender;
        $userDOB = Auth::guard('students')->user()->dob;
    } elseif (Auth::guard('web')->check()) {
        $username = Auth::guard('web')->user()->username;
        $userEmail = Auth::guard('web')->user()->email;
        $userPhone = Auth::guard('web')->user()->phone;
        $userGender = Auth::guard('web')->user()->gender;
        $userDOB = Auth::guard('web')->user()->dob;
    }
    @endphp
    <div class="containerSetting">
        <div class="sideMenu">
            <div class="program-menu active" data-name="content-1" id="Content-1">
                Details
                <div></div>
            </div>

            <div class="program-menu" data-name="content-2" id="Content-2">
                Account
                <div></div>

            </div>

        </div>
        <div class="mainContent">
            <div class="program-content" id="content-1">
                <table class="contentTable" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height: 100px; vertical-align: top;">
                            <img src="{{ URL::asset('/image/Persona.svg') }}" draggable="false" style="width:130px;">
                        </td>
                        <td>
                            <input type="text" name="username" value="{{ $username }}">
                            <textarea placeholder="Self Description" rows="5"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <table cellpadding="0" cellspacing="0" border="0" style="width: min-content;margin:10px 0">
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
                    <tr>
                        <td>Mobile</td>
                        <td><input type="text" name="phone" value="{{ $userPhone }}" style="margin-top: 10px;"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="{{ $userEmail }}"></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><input type="date" name="dob" value="{{ $userDOB }}"></td>
                    </tr>

                </table>
            </div>
            <div class="program-content" id="content-2">
                <table class="contentTable" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2" style="text-align:left">
                           <h2 style="margin-bottom:0px; font-weight:700">Change Password</h2>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Current Password</td>
                        <td><input type="password" name="password" style="margin-top: 10px;"></td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input type="password" name="newPassword"></td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password"></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var nowurl = window.location.hash;
            $(".program-content:not(#content-1)").hide();
            $(".program-menu").on("click", function() {
                $(".sideMenu").find(".program-menu").removeClass("active");
                $(this).addClass("active");
                var obj = $(this).attr("data-name");
                $(".program-content").hide();
                $("#" + obj).fadeIn(500);
            });
        });
    </script>


    <style>
        .program-menu {
            color: #888888;
            width: 100%;
            margin-bottom: 30px;
            box-sizing: border-box;
            padding-left: 10px;
            cursor: pointer;
            position: relative;
        }

        .program-menu.active {
            color: #666666!important;
        }

        .program-menu div{
            position: absolute;
            right: 0px;
            top: -8px;
            height: 35px;
            width: 7px;
            background: #ffffff;
            border-radius: 5px 0px 0px 5px;
            transition: 0.3s;
        }

        .program-menu.active div{
            background: #F28F3B;
            transition: 0.3s;
        }

        .containerSetting {
            width: calc(100% - 13.54vw);
            float: right;
            display: flex;

            margin-top: 55px;
            height: 90vh;
            padding: 15px;
            box-sizing: border-box;
        }

        .sideMenu {
            width: 129px;
            border-right: 1px solid #cccccc;
            float: left;
            padding-top:10px;
        }

        .mainContent {
            width: 100%;
            display: flex;
            float: right;
            height: 90vh;
            padding: 0 0 0 24px;
            box-sizing: border-box;
        }

        .contentTable {
            color: #888888;
            height: fit-content;
        }

        .contentTable td:first-of-type {
            text-align: right;
            box-sizing: border-box;
            padding-right: 35px;
            width: 212px;
        }

        .contentTable input,
        textarea {
            background-color: #F1F5F8;
            width: 100%;
            outline: 0;
            border: none;
            padding: 10px;
            color: #6C757D;
            margin-bottom: 10px;
        }


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

    </style>

@endsection
