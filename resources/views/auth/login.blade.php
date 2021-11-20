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
            <a href="{{ '/' }}"><img class="logoContainer" draggable="false"
                    src="{{ URL::asset('/image/logo-color.svg') }}" title="TuTime" alt="TuTime"></a>

            <div class="signCenter">
                <div class="signInWord">Sign in to TuTime</div>
                <div class="formContainer">

                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="userSelect">
                            <table cellpadding="0" cellspacing="0" border="0" style="width: fit-content;">
                                <tr>
                                    <td>
                                        <label class="container">
                                            <input type="radio" checked="checked" value="tutor" name="user"
                                                {{ old('user') == 'tutor' ? 'checked' : '' }}>
                                            <span class="checkmark">Tutor</span>
                                        </label>
                                    </td>
                                    <td> <span style="padding:0 10px">|</span>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" value="student" name="user"
                                                {{ old('user') == 'student' ? 'checked' : '' }}>
                                            <span class="checkmark">Student</span>
                                        </label>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                            {{-- <input type="radio" value="tutor" name="user" checked="checked" class="userMenu selected" title="Tutor" alt="Tutor">Tutor
                            <span style="padding:0 10px">|</span>
                            <input type="radio" value="student" name="user" class="userMenu" title="Student" alt="Student">Student --}}
                        </div>

                        <div class="textContainer" ">
                            <input class="@error('email') errorBorder @enderror" type="text" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                            <label for="email">
                                <svg viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24.9945 24.3457H3.00558C1.46685 24.3457 0.214844 23.0937 0.214844 21.5549V6.44515C0.214844 4.90642 1.46685 3.65442 3.00558 3.65442H24.9945C26.5332 3.65442 27.7852 4.90642 27.7852 6.44515V21.5549C27.7852 23.094 26.5332 24.3457 24.9945 24.3457ZM3.00558 5.49244C2.48021 5.49244 2.05287 5.92009 2.05287 6.44515V21.5549C2.05287 22.0803 2.48021 22.5077 3.00558 22.5077H24.9945C25.5199 22.5077 25.9472 22.08 25.9472 21.5549V6.44515C25.9472 5.91978 25.5195 5.49244 24.9945 5.49244H3.00558Z"
                                        fill="#CCCCCC" />
                                    <path
                                        d="M14 17.1943C12.3433 17.1943 10.7531 16.4922 9.63714 15.268L0.978516 5.76727L2.33712 4.52905L10.9958 14.0295C11.7754 14.8848 12.8424 15.3563 14 15.3563C15.1577 15.3563 16.2246 14.8851 17.0046 14.0295L25.6635 4.52905L27.0218 5.76727L18.3626 15.2677C17.2469 16.4922 15.6567 17.1943 14 17.1943Z"
                                        fill="#CCCCCC" />
                                    <path
                                        d="M9.45033 13.763L1.02832 22.228L2.3313 23.5244L10.7533 15.0594L9.45033 13.763Z"
                                        fill="#CCCCCC" />
                                    <path
                                        d="M18.5507 13.7628L17.2476 15.0592L25.6696 23.5254L26.9727 22.229L18.5507 13.7628Z"
                                        fill="#CCCCCC" />
                                </svg>
                            </label>
                        </div>
                        @error('email')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="textContainer">
                            <input class="@error('password') errorBorder @enderror" type="password" id="password" placeholder="Password" name="password">
                            <label for="email">
                                <svg viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_96_326)">
                                <path d="M26.8221 1.17411C25.2576 -0.380629 22.7118 -0.380629 21.1473 1.17411C20.7551 1.56385 20.4548 2.02033 20.2551 2.51737C18.6822 1.30109 16.401 1.40976 14.9561 2.84561C14.1965 3.60043 13.7782 4.60441 13.7783 5.67255C13.7783 6.74075 14.1966 7.74466 14.9561 8.49943C15.3726 8.91338 15.8591 9.21599 16.3777 9.40949L0.241912 25.4725C-0.0806465 25.7931 -0.0806465 26.315 0.241967 26.6356L1.31191 27.7535C1.6319 28.0715 2.14868 28.0713 2.46834 27.753L4.95123 25.1732L6.99716 27.2063C7.1571 27.3653 7.36613 27.4447 7.5751 27.4447C7.78577 27.4447 7.99649 27.3639 8.1567 27.2027C8.47593 26.8814 8.47429 26.3623 8.15309 26.0431L7.5892 25.4828L8.59897 24.4793C8.60083 24.4811 8.60236 24.4832 8.60422 24.4851L9.17543 25.0527C9.33537 25.2116 9.54434 25.291 9.75337 25.291C9.96409 25.291 10.1748 25.2103 10.335 25.049C10.6542 24.7278 10.6526 24.2087 10.3314 23.8895L8.28718 21.8581L18.5804 11.6558C18.78 12.1456 19.078 12.5954 19.4653 12.9803C20.2475 13.7576 21.2751 14.1463 22.3027 14.1463C23.3302 14.1463 24.3578 13.7576 25.1401 12.9803C25.8997 12.2254 26.318 11.2215 26.318 10.1533C26.318 9.25622 26.0219 8.40509 25.4775 7.7081C25.9672 7.51399 26.4263 7.22133 26.8222 6.82793C27.5818 6.07311 28 5.06914 28 4.001C28 2.93291 27.5817 1.92894 26.8221 1.17411V1.17411ZM15.4181 5.6726C15.418 5.04438 15.6645 4.45354 16.112 4.00881C16.5756 3.54807 17.1845 3.31772 17.7936 3.31772C18.4024 3.31772 19.0115 3.54812 19.4751 4.00876C19.9225 4.45348 20.169 5.04432 20.169 5.67255C20.1689 6.30072 19.9225 6.89161 19.4751 7.33629C18.5478 8.25766 17.0392 8.25766 16.112 7.33629C15.6645 6.89167 15.4181 6.30078 15.4181 5.6726ZM23.9842 11.8172C23.0569 12.7386 21.5483 12.7386 20.6211 11.8172C20.1736 11.3725 19.9272 10.7817 19.9272 10.1534C19.9272 9.52527 20.1736 8.93438 20.6211 8.4897C21.0847 8.02901 21.6937 7.79867 22.3026 7.79867C22.9116 7.79867 23.5206 8.02901 23.9842 8.4897C24.4316 8.93438 24.6781 9.52527 24.6781 10.1534C24.6781 10.7816 24.4316 11.3725 23.9842 11.8172ZM25.6662 5.66479C24.739 6.58616 23.2304 6.58616 22.3031 5.66479C21.8557 5.22006 21.6092 4.62922 21.6092 4.00105C21.6092 3.37288 21.8557 2.78199 22.3031 2.33726C22.7668 1.87652 23.3757 1.64623 23.9847 1.64623C24.5936 1.64623 25.2027 1.87662 25.6663 2.33726C26.1137 2.78199 26.3602 3.37282 26.3602 4.00105C26.3601 4.62922 26.1137 5.22011 25.6662 5.66479V5.66479Z" fill="#CCCCCC"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_96_326">
                                <rect width="28" height="28" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                            </label>
                        </div>
                        @error('password')
                            <div class="errorMessage">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (session('status'))
                            <div class="errorMessage" style="margin-top:15px">
                                {{ session('status') }}
                            </div>
                        @endif

                        <button type="submit" class="submitButton" title="Submit" alt="Submit">LOGIN</button>
                    </form>
                    {{-- <div class="userContent" id="content-2">
                        <div class="textContainer">
                            <img src="{{URL::asset('/image/mail.svg')}}" draggable="false">
                            <input type="text" placeholder="Email" name="emailStudent">
                        </div>
                        <div class="textContainer">
                            <img src="{{URL::asset('/image/Pwd Icon.svg')}}" draggable="false">
                            <input type="text" placeholder="Password" name="passwordStudent">
                        </div>

                        <a class="submitButton" title="Submit" alt="Submit" href="">SIGN IN</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="welcomeBox">
            <div class="welcomeCenter">

                <div class="welcomeWord">Hi, My Friend!</div>
                <div>Sign up and start to manage your timetable in one click.</div>
                <a class="signButton" title="Sign In Now" alt="Sign In Now"
                    href="{{ route('registerTutor') }}">SIGN
                    UP</a>
            </div>
        </div>
    </div>
</body>

</html>
