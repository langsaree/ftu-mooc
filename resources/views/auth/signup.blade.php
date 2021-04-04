<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/e3b0f576bf.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Sign in & Sign up</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <div role="tabpanel" class="tab-pane fade active in" id="signup" aria-labelledby="signin-tab">
            <form role="form" id="Sign up" class="pretty-form" name="sign-up-Submit" action="{{ route('students.store') }}" method="post" >

                <a href="{{ url('/') }}">
                    <img  src="{{asset('svg/ftu.png')}}"  alt=""  />
                </a>
                <h2 class="title">Sign up</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control" name="username" id="username" placeholder="xxx@gmail.com" required="required" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required="required" />
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="fullname" required="required" />
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="nickname" id="nickname" placeholder="nickname" required="required" />
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="sex" id="sex" placeholder="sex" required="required" />
                </div>

                <input type="submit" class="btn solid" id="sign-up-Submit" value="Sign up" />

                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <a href="" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-github"></i>
                    </a>

                    <a href="login/google" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>

                </div>
            </form>


        </div>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Welcome To FTUMooc</h3>
                <p>
                    If you are a member sign in here
                </p>
                <button class="btn transparent"  onclick="location.href='{{ url('/signin') }}'">
                    Sign up
                </button>

            </div>
            <img  src="{{asset('svg/send1.svg')}}" class="image" alt="" />
        </div>

    </div>
</div>

<script   src="{{asset('js/app2.js')}}"></script>
</body>
</html>


