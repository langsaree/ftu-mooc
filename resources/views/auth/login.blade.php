<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="บทเรียนออนไลน์">
    <meta name="keywords" content="บทเรียนออนไลน์">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MOOC</title>
    <!-- Bootstrap -->
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('style/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/style.css') }}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('style/js/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('style/js/jquery.justifiedGallery.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('style/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('style/js/script.min.js') }}"></script>
    <link href="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="sign-container">

                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#signin" id="signin-tab" role="tab" data-toggle="tab" aria-controls="signin" aria-expanded="true">Login</a></li>
                    <li><a href="{{ url('/') }}" >Back to homepage</a></li>
                </ul><!-- #myTabs -->

                <div id="myTabContent" class="tab-content">

                    <div role="tabpanel" class="tab-pane fade active in" id="signin" aria-labelledby="signin-tab">
                        <div class="sign-content">
                            <div class="sign-description" style="background-image: url('{{ asset('style/img/amalia-image-slider-02.jpg') }}');">
                                <div class="description-text">
                                    <h3>Login FTUMOOC</h3>
                                    <p>หากพบปัญหาในการเข้าระบบ ให้ติดต่อผู้ดูแลระบบ</p>
                                    <p>ยังไม่มี Username &  Password</p>
                                    <a href="{{ url('signup') }}"class="btn btn-block btn-square btn-lg btn-success">Register</a>

                                    <p></p>
                                    <a href="#signup"class="btn btn-sm btn-square btn-lg btn-danger">Forgot the password, right?</a>
                                </div><!-- .description-text -->
                            </div><!-- .sign-description -->

                            <div class="sign-form">
                                <form role="form" id="login" name="loginSubmit" action="{{ route('login') }}" method="post" class="pretty-form">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email"  placeholder="xxx@gmail.com" >
                                        <span class="fa fa-user"></span>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">password</label>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="ต้องใส่6ตัวขึ้นไป มีตัวพิมพ์เล็กใหญ่">
                                        <span class="fa fa-lock"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button type="submit" id="loginSubmit" class="btn btn-success btn-square btn-block btn-lg">Login</button>
                                    <br>
                                    <p>Student=fadeelah@gmail.com /123456</p>
                                    <p>lecturer=abdul_latif@gmail.com /Abdul12345</p>
                                    <p>admin=myadmin@gmail.com /adminadmin</p>


                                </form><!-- .pretty-form -->
                            </div><!-- .sign-form -->

                        </div><!-- .sign-content -->
                    </div><!-- .tab-pane -->



                </div><!-- #myTabContent -->

            </div><!-- .sign-container -->
        </div><!-- .col-md-8 -->
    </div><!-- .row -->
</div><!-- .container -->

</body>
</html>--}}
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
            <form role="form" id="login" name="loginSubmit" action="{{ route('login') }}" method="post" class="sign-in-form">
                <a href="{{ url('/') }}">
                    <img  src="{{asset('svg/ftu.png')}}"  alt=""  />
                </a>
                <h2 class="title">Sign in</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="xxx@gmail.com" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password"  name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" />

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                    @endif
                </div>

                <input type="submit" value="Login" class="btn solid" id="loginSubmit"/>

                <p class="social-text">Or Sign in with social platforms</p>
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



          {{--  <form  class="sign-up-form ">
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
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="edu" id="edu" placeholder="edu" />
                    </div>

                 --}}{{--   <button type="submit" class="btn btn-success btn-square btn-block btn-lg">Register</button>--}}{{--
                    <input type="submit" class="btn solid" id="sign-up-Submit" value="Sign up" />

                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-github"></i>
                        </a>

                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div>
                </form>
            </form>--}}
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
                <button class="btn transparent" {{--id="sign-up-btn"--}} onclick="location.href='{{ url('/signup') }}'">
                    Sign up
                </button>

                <p>
                    Register here if you are a teacher
                </p>
                <button class="btn transparent " onclick="location.href='{{ url('instructor-register') }}'"  >
                    Sign up for teacher
                </button>

            </div>
            <img  src="{{asset('svg/log2.svg')}}" class="image" alt="" />
        </div>
       {{-- <div class="panel right-panel">
            <div class="content">
                <h3>Register to FTUMooc</h3>
                <p>
                    If you are a member sign in here
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img  src="{{asset('svg/register.svg')}}" class="image" alt="" />
        </div>--}}
    </div>
</div>

<script   src="{{asset('js/app2.js')}}"></script>
</body>
</html>
