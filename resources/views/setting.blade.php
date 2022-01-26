@extends('layout.nav')

@section('content')



    <style>
        .errorMessage {
            font-size: 14px;
            margin-bottom: 15px;
            margin-top: -7px;
            color: #ff0000;
            width: 100%;
        }

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
            color: #666666 !important;
        }

        .program-menu div {
            position: absolute;
            right: 0px;
            top: -8px;
            height: 35px;
            width: 7px;
            background: #ffffff;
            border-radius: 5px 0px 0px 5px;
            transition: 0.15s;
        }

        .program-menu.active div {
            background: #F28F3B;
            transition: 0.15s;
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
            padding-top: 10px;
            height: 100vh;

        }

        .mainContent {
            width: 100%;
            float: right;
            height: 90vh;
            padding: 0 0 0 24px;
            box-sizing: border-box;
        }

        .contentTable {
            color: #888888;
            height: fit-content;
            width: 60%;
            min-width: 700px;
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
            box-sizing: border-box;
        }

        .contentTable input.errorBorder,
        textarea.errorBorder {

            border: 1px solid #ff0000;

        }



        .contentTable button {
            background-color: transparent;
            width: 160px;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            border: 1px solid #F28F3B;
            padding: 0 10px;
            color: #F28F3B;
            margin-top: 20px;
            box-sizing: border-box;
            cursor: pointer;
            transition: 0.3s;

        }

        .contentTable button:hover {
            background-color: #F28F3B;
            border: 1px solid #F28F3B;
            color: #ffffff;
            transition: 0.3s;
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

        #portfolioContent h1,
        #portfolioContent h2,
        #portfolioContent h3,
        #portfolioContent h4,
        #portfolioContent h5 {
            color: #F28F3B;
        }

    </style>


    @php
    if (Auth::guard('students')->check()) {
        $userCurrent = Auth::guard('students');
    } elseif (Auth::guard('web')->check()) {
        $userCurrent = Auth::guard('web');
    }
    @endphp

    <div class="containerSetting">
        <div class="sideMenu">
            <div class="program-menu active" data-name="details" id="Details">
                Details
                <div></div>
            </div>

            <div class="program-menu" data-name="account" id="Account">
                Account
                <div></div>

            </div>

            @if (Auth::guard('web')->check())
                <div class="program-menu" data-name="portfolio" id="Portfolio">
                    Portfolio
                    <div></div>

                </div>
            @endif

        </div>
        <div class="mainContent">
            <div class="program-content" id="details">
                <form action="{{ route('settings') }}" method="post">
                    @csrf

                    <table class="contentTable" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="height: 100px; vertical-align: top;">
                                <img src="{{ URL::asset('/image/Persona.svg') }}" draggable="false" style="width:130px;">
                            </td>
                            <td>
                                <input class="@error('username') errorBorder @enderror" type="text" name="username"
                                    value="{{ $userCurrent->user()->username }}">
                                @error('username')
                                    <div class="errorMessage">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <textarea placeholder="Self Description" rows="5" name="description"
                                    style="resize: none">{{ $userCurrent->user()->description }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" style="width: min-content;margin:10px 0">
                                    <tr>

                                        <td>
                                            <label class="container">Male
                                                <input type="radio" <?php if ($userCurrent->user()->gender == 'male') {
    echo 'checked';
} ?> value="male" name="gender">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="container">Female
                                                <input type="radio" <?php if ($userCurrent->user()->gender == 'female') {
    echo 'checked';
} ?> value="female" name="gender">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>

                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><input type="text" class="@error('phone') errorBorder @enderror" name="phone"
                                    value="{{ $userCurrent->user()->phone }}" style="margin-top: 10px;">
                                @error('phone')
                                    <div class="errorMessage">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        {{-- <tr>
                            <td>Email</td>
                            <td><input type="text" class="@error('email') errorBorder @enderror" name="email" value="{{ $userEmail }}">@error('email')
                                <div class="errorMessage">
                                    {{ $message }}
                                </div>
                                @enderror
                            </td>
                        </tr> --}}
                        <tr>
                            <td>Date of Birth</td>
                            <td><input type="date" class="@error('dob') errorBorder @enderror" name="dob"
                                    value="{{ $userCurrent->user()->dob }}">
                                @error('dob')
                                    <div class="errorMessage">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:right">
                                <button type="submit" name="changeDetails" title="Save" alt="Save">Save</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="program-content" id="account">
                <form action="{{ route('settings') }}" method="post">
                    @csrf

                    <table class="contentTable" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2" style="text-align:left">
                                <h2 style="margin-bottom:0px; font-weight:700">Change Password</h2>
                            </td>

                        </tr>
                        <tr>
                            <td>Current Password</td>
                            <td><input class="@error('password') errorBorder @enderror @if (session('status')) errorBorder @endif"
                                    type="password" name="password" style="margin-top: 10px;">
                                @if (session('status'))
                                    <div class="errorMessage">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @error('password')
                                    <div class="errorMessage">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>New Password</td>
                            <td><input class="@error('newPassword') errorBorder @enderror" type="password"
                                    name="newPassword">
                                @error('newPassword')
                                    <div class="errorMessage">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input class="@error('newPassword_confirmation') errorBorder @enderror" type="password"
                                    name="newPassword_confirmation">
                                @error('newPassword_confirmation')
                                    <div class="errorMessage">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align:right"><button type="submit" name="changePassword"
                                    title="Save">Save</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            @if (Auth::guard('web')->check())
                <div class="program-content" id="portfolio">
                    <form action="{{ route('settings') }}" method="post">
                        @csrf
                        <table class="contentTable" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="2" style="text-align:left">
                                    <h2 style="margin-bottom:10px; font-weight:600">Portfolio</h2>
                                </td>
                            </tr>


                            {{-- <tr>
                                <td>Teaching Mode</td>
                                <td>
                                    <table cellpadding="0" cellspacing="0" border="0" style="margin:10px 0">
                                        <tr>

                                            <td>
                                                <label class="container">Blended Learning
                                                    <input type="radio" checked="checked" value="bl" name="teachingmode">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="container">Online
                                                    <input type="radio" value="online" name="teachingmode">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="container" style="margin-left: 30px;">facetoface
                                                    <input type="radio" value="f2f" name="teachingmode">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> --}}

                            <tr>
                                <td colspan="2" style="text-align: left">
                                    <div id="portfolioContent" style="line-height: 1.5; display:none">@php echo $userCurrent->user()->portfolio @endphp</div>
                                    <textarea name='portfolioArea' id='portfolioArea' rows='500' cols='80'></textarea>
                                </td>
                            </tr>

                            {{-- <tr>
                                <td colspan="2" style="text-align: left">
                                    <label for='experience'>Teaching Experience</label>
                                    <textarea name='experience' id='experience' rows='5' cols='80'></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left;padding-top: 20px;">
                                    <label for='education'>Education</label>
                                    <textarea name='education' id='education' rows='5' cols='80'></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left;padding-top: 20px;padding-top: 20px;">
                                    <label for='subject'>Tutoring Subject</label>
                                    <textarea name='subject' id='subject' rows='5' cols='80'></textarea>
                                </td>
                            </tr> --}}

                            <tr>
                                <td></td>
                                <td style="text-align:right"><button type="submit" name="portfolioUpdate"
                                        title="Save">Save</button>
                                </td>
                            </tr>
                        </table>

                </div>
            @endif






        </div>
    </div>
    <script>
        $(document).ready(function() {
            var nowurl = window.location.hash;
            if (window.location.hash) {
                $(".sideMenu").find(".program-menu").removeClass("active");
                $(".program-content:not(window.location.hash)").hide();
                var obj2 = $(location.hash).attr("data-name");
                $("#" + obj2).fadeIn(500);
                $(location.hash).addClass("active");
            } else {
                $(".program-content:not(#details)").hide();
            }
            $(".program-menu").on("click", function() {
                $(".sideMenu").find(".program-menu").removeClass("active");
                $(this).addClass("active");
                var obj = $(this).attr("data-name");
                $(".program-content").hide();
                $("#" + obj).fadeIn(500);
            });

            var contentText = $('#portfolioContent').html();
            CKEDITOR.replace('portfolioArea');
            CKEDITOR.instances['portfolioArea'].setData(contentText);

            // CKEDITOR.replace('education');

            // CKEDITOR.replace('subject');




        });
    </script>

@endsection
