@extends('layout.registerSide')

@section('content')
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
                    <form id="tutorForm" action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="textContainer @error('email') errorBorder @enderror">
                            <img src="../image/mail.svg" draggable="false">
                            <input type="text" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="textContainer @error('password') errorBorder @enderror">
                            <img src="../image/Pwd Icon.svg" draggable="false">
                            <input type="password" id="password" placeholder="Password" name="password">
                        </div>
                        @error('password')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="textContainer @error('password_confirmation') errorBorder @enderror">
                            <img src="../image/Pwd Icon.svg" draggable="false">
                            <input type="password" id="password_confirmation" placeholder="Re-Type Password"
                                name="password_confirmation">
                        </div>
                        @error('password_confirmation')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <a class="checkValidation submitButton">Check</a> --}}

                        <button class="submitButton" type="submit" title="Submit" alt="Submit">SUBMIT</button>
                    </form>
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
    <script>
        // $('.checkValidation').click(function() {
        //     $("#tutorForm").validate()({
        //         rules: {
        //             email: {
        //                 required: true,
        //                 email: true,
        //             },
        //             password: {
        //                 required: true,
        //                 minlength: 8,
        //             },
        //             password_confirmation: 'required',
        //         },

        //         message: {
        //             email: {
        //                 required: "Please enter your email",
        //                 email: "Please enter a valid email address"
        //             },
        //             password: {
        //                 required: "Please provide a password",
        //                 minlength: "Your password must be at least 8 characters long"
        //             },
        //             password_confirmation: "Please re-enter your password",                   
        //         },

        //     })
        // });


        // $(function() {
        //     $("#").validate();
        // });
    </script>
@endsection
