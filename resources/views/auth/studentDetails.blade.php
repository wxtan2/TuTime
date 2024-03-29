@extends('layout.registerSide')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Da+2&family=Lato:wght@100;400&family=Sacramento&display=swap');

        html {
            background: url('/image/login.png') no-repeat center center fixed!important;
            background-size: cover;
            font-family: 'Baloo Da 2', cursive;
            font-size: 16px;
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
