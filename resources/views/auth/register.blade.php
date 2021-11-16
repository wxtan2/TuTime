<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/loginRegister.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>TuTime</title>
</head>

<body>
    <div class="registerContent">
        <div class="welcomeBox">
            <div class="welcomeCenter">
                <img src="../image/logo.svg" title="TuTime" alt="TuTime">

                <div class="welcomeWord">Welcome Back</div>
                <div>Already have an account? Log in to keep connect between tutor and student</div>
                <a class="signButton" title="Sign In Now" alt="Sign In Now" href="{{ route('login') }}">SIGN IN</a>
            </div>
        </div>
        <div class="registerBox">
            <div class="signCenter">
                <div class="signInWord">Create Account</div>
                <div class="formContainer">
                    <div class="userSelect">
                        <a class="userMenu selected" data-name="content-1" href="#" title="Tutor" alt="Tutor">Tutor</a>
                        <span style="padding:0 10px">|</span>
                        <a href="#" class="userMenu" title="Student" data-name="content-2" alt="Student">Student</a>
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
                        <div class="textContainer">
                            <img src="../image/Pwd Icon.svg" draggable="false">
                            <input type="text" placeholder="Re-Type Password" name="2ndpasswordTutor">
                        </div>
                        <a class="submitButton" title="Submit" alt="Submit" href="">SUBMIT</a>
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
                        <div class="textContainer">
                            <img src="../image/Pwd Icon.svg" draggable="false">
                            <input type="text" placeholder="Re-Type Password" name="2ndpasswordStudent">
                        </div>
                        <a class="submitButton" title="Submit" alt="Submit" href="">SUBMIT</a>
                    </div>
                </div>
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
