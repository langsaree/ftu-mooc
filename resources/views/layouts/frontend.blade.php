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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600' rel='stylesheet'
          type='text/css'>
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
    <!-- <script src="https://mooc.rmu.ac.th/style/js/script.min.js"></script>-->
    <link href="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css') }}"
          rel="stylesheet">
    <script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{ asset('style/fancybox/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="{{ asset('style/fancybox/source/jquery.fancybox.css') }}" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="{{ asset('style/fancybox/source/jquery.fancybox.pack.js') }}"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="{{ asset('style/fancybox/source/jquery.fancybox-buttons.css') }}" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="{{ asset('style/fancybox/source/jquery.fancybox-buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('style/fancybox/source/jquery.fancybox-media.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('style/fancybox/source/jquery.fancybox-thumbs.css') }}" type="text/css"
          media="screen"/>
    <script type="text/javascript" src="{{ asset('style/fancybox/source/jquery.fancybox-thumbs.js') }}"></script>
    <script src="https://www.youtube.com/player_api"></script>


    <!-- Load the source files -->
    <link href="//vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/5.8/video.min.js"></script>
</head>
<body>

<!-- site -->
<div class="site-main">

    <!-- topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="social-icon">
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube"></i></a></li>
                    </ul><!-- .social-icon -->
                </div><!-- .col-sm-6 -->

                <div class="col-sm-6">
                    @guest
                    <ul class="topbar-menu">
                        <li><a href="{{ url('instructor-register') }}">For teachers</a></li>
                        <li><a href="{{ url('signup') }}">signup</a></li>
                        <li><a href="{{ url('signin') }}">Sign in</a></li>

                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul><!-- .topbar-menu -->
                    @else
                        <ul class="topbar-menu">
                            <li><a href="javascript:void(0)">Hello {{ Auth::user()->name }}</a></li>
                            @if(Auth::user()->role_id == 1)
                                <li><a href="{{ url('myadmin') }}">Dashboard</a></li>
                            @elseif(Auth::user()->role_id == 2)
                                <li><a href="{{ url('instructor-dashboard') }}">Dashboard</a></li>
                            @elseif(Auth::user()->role_id == 3)
                                <li><a href="{{ url('Mycourse') }}">My course</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul><!-- .topbar-menu -->
                    @endif

                </div><!-- .col-sm-6 -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .topbar -->

    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <h1 class="site-title"><a href="{{ url('/') }}">FTUMOOC</a></h1>
                    <p class="site-description">พื้นที่เรียนรู้ตลอดชีวิตสำหรับทุกคน</p>
                </div><!-- .col-sm-6 -->


                <div class="col-sm-4">
                    <ul class="nav navbar-nav pull-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Study category <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @php
                                    $faculties = DB::table('faculties')->get();

                                @endphp
                                @foreach($faculties as $f)
                                    <li><a href="{{ url('get-faculties/'.$f->id) }}">{{ $f->faculty_name }}</a></li>

                                @endforeach
                            </ul>
                        </li>
                    </ul>

                </div><!-- .col-sm-6 -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .header -->

    <!-- team -->
@yield('content')
<!-- team --> <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Copyright 2018.mooc All Right Reserved.</strong></p>
                </div><!-- .col-md-4 -->
                <div class="col-md-8">
                    <ul>
                        {{--<li><a href="{{ url('/') }}">หน้าแรก</a></li>--}}
                        {{--<li><a href="">เกี่ยวกับ MOOC</a></li>--}}
                        {{--<li><a href="{{ url('/contact') }}">ติดต่อเรา</a></li>--}}
                       {{----}}
                    </ul>
                </div><!-- .col-md-8 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .copyright -->

</div><!-- .site-main -->
<!-- AJAX CONTACT -->
<script type="text/javascript" src="{{ asset('pg/contact_ajax.js') }}"></script>
@yield('js')

</body>
</html>
