@extends('layout.registerSide')

@section('content')
    <div class="registerBox">
        <div class="signCenter">
            <div class="signInWord">Create Account</div>
            <div class="formContainer">
                <div class="userSelect">
                    <a class="userMenu selected" data-name="content-1"title="Tutor" alt="Tutor">Tutor</a>
                    <span style="padding:0 10px">|</span>
                    <a href="{{ route('registerStudent') }}" class="userMenu" title="Student" alt="Student">Student</a>
                </div>
                <div class="userContent" id="content-1">
                    <form id="tutorForm" action="{{ route('registerTutor') }}" method="post">
                        @csrf

                        <div class="textContainer @error('email') errorBorder @enderror">
                            <img src="{{URL::asset('/image/mail.svg')}}" draggable="false">
                            <input type="text" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="textContainer @error('password') errorBorder @enderror">
                            <img src="{{URL::asset('/image/Pwd Icon.svg')}}" draggable="false">
                            <input type="password" id="password" placeholder="Password" name="password">
                        </div>
                        @error('password')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="textContainer @error('password_confirmation') errorBorder @enderror">
                            <img src="{{URL::asset('/image/Pwd Icon.svg')}}" draggable="false">
                            <input type="password" id="password_confirmation" placeholder="Re-Type Password"
                                name="password_confirmation">
                        </div>
                        @error('password_confirmation')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="submitButton" type="submit" title="Submit" alt="Submit">SUBMIT</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
