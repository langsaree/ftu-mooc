<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/e3b0f576bf.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Signin for Teacher</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form role="form" id="login" name="loginSubmit" action="{{ route('login') }}" method="post" class="sign-in-form">
                <a href="{{ url('/') }}">
                    <img  src="{{asset('svg/ftu.png')}}"  alt=""  />
                </a>
                <h2 class="title">Sign in</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="xxx@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" />

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                    @endif
                </div>

                <input type="submit" value="Login" class="btn solid" id="loginSubmit"/>

                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Welcome To FTUMooc</h3>
                <p>
                    Register here if you don't have
                    Username & Password!
                </p>
                <button href="{{ url('/') }}" class="btn transparent" id="">
                    HOME
                </button>
            </div>
            <img  src="{{asset('svg/teach.svg')}}" class="image" alt="" />
        </div>
    </div>
</div>

<script   src="{{asset('js/app2.js')}}"></script>
</body>
</html>