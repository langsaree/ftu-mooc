<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
                    <li role="presentation" class="active"><a href="#signin" id="signin-tab" role="tab" data-toggle="tab" aria-controls="signin" aria-expanded="true">เข้าสู่ระบบ</a></li>
                    <li><a href="{{ url('/') }}" >กลับหน้าแรก</a></li>
                </ul><!-- #myTabs -->

                <div id="myTabContent" class="tab-content">

                    <div role="tabpanel" class="tab-pane fade active in" id="signin" aria-labelledby="signin-tab">
                        <div class="sign-content">
                            <div class="sign-description" style="background-image: url('{{ asset('style/img/amalia-image-slider-02.jpg') }}');">
                                <div class="description-text">
                                    <h3>เข้าสู่ระบบ FTUMOOC</h3>
                                    <p>หากพบปัญหาในการเข้าระบบ ให้ติดต่อผู้ดูแลระบบ</p>
                                    <p>ยังไม่มี Username &  Password</p>
                                    <a href="{{ url('signup') }}"class="btn btn-block btn-square btn-lg btn-success">สมัครสมาชิก</a>

                                    <p></p>
                                    <a href="#signup"class="btn btn-sm btn-square btn-lg btn-danger">ลืมรหัสใช่ไหม?</a>
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
                                        <label for="exampleInputPassword1">Password</label>
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
</html>
