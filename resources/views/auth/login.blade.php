<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>TuTime</title>
</head>

<body>
    <div class="registerContent">
        <div class="registerBox">
            <div class="signCenter">
                <img src="../image/logo-color.svg" title="TuTime" alt="TuTime">
                <div class="signInWord">Sign in to TuTime</div>
                <div class="formContainer">
                    <div class="userSelect">
                        <a class="userMenu selected" data-name="content-1" href="#" title="Tutor" alt="Tutor">Tutor</a>
                        <span style="padding:0 10px">|</span>
                        <a href="#" class="userMenu" title="Student" data-name="content-2"
                            alt="Student">Student</a>
                    </div>
                    <div class="userContent" id="content-1">
                        <div class="textContainer">
                            <img src="../image/mail.svg" draggable="false">
                            <input type="text" placeholder="Email" name="emailTutor">
                        </div>
                        <div class="textContainer">
                            <img src="../image/Pwd Icon.svg" draggable="false">
                            <input type="text" placeholder="Password" name="passwordTutor">
                        </div>

                        <a class="submitButton" title="Submit" alt="Submit" href="{{'dashboard'}}">SUBMIT</a>
                    </div>
                    <div class="userContent" id="content-2">
                        <div class="textContainer">
                            <img src="../image/mail.svg" draggable="false">
                            <input type="text" placeholder="Email" name="emailStudent">
                        </div>
                        <div class="textContainer">
                            <img src="../image/Pwd Icon.svg" draggable="false">
                            <input type="text" placeholder="Password" name="passwordStudent">
                        </div>

                        <a class="submitButton" title="Submit" alt="Submit" href="">SIGN IN</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="welcomeBox">
            <div class="welcomeCenter">

                <div class="welcomeWord">Hi, My Friend!</div>
                <div>Sign up and start to manage your timetable in one click.</div>
                <a class="signButton" title="Sign In Now" alt="Sign In Now" href="{{ route('register') }}">SIGN
                    UP</a>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $(".userContent:not(#content-1)").hide();
        $(".userMenu").on("click", function() {
            $(".userSelect").find(".userMenu").removeClass("selected");
            $(this).addClass("selected");
            var obj = $(this).attr("data-name");
            $(".userContent").hide();
            $("#" + obj).fadeIn(300);
        });
    });
</script>

</html>
