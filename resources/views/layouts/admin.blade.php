<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ระบบจัดการ FTUMOOC สำหรับผู้สอน</title>

    <!-- Vendor CSS -->
    <link href="{{ asset('pg/superflat/vendors/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}"
          rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/summernote/dist/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/farbtastic/farbtastic.css') }}" rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/chosen_v1.4.2/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css') }}"
          rel="stylesheet">
    <!-- CSS -->
    <link href="{{ asset('') }}pg/superflat/css/app.min.css" rel="stylesheet">
</head>

<body>
<header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
    <ul class="header-inner">

        <!-- Logo -->
        <li class="logo">
            <a href="" style="font-size: 24px;color: #ffff;text-align: center;">FTUMOOC</a>
            <div id="menu-trigger"><i class="zmdi zmdi-menu"></i></div>
        </li>


        <!-- Settings -->
        <li class="pull-right dropdown hidden-xs">
            <a href="" data-toggle="dropdown">
                <i class="zmdi zmdi-more-vert"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a data-toggle="fullscreen" href="">Toggle Fullscreen</a></li>
                <li><a data-toggle="localStorage" href="">Clear Local Storage</a></li>

            </ul>
        </li>


        <!-- Time -->
        <li class="pull-right hidden-xs">
            <div id="time">
                <span id="t-hours"></span>
                <span id="t-min"></span>
                <span id="t-sec"></span>
            </div>
        </li>
    </ul>
</header>
@guest
<aside id="sidebar">

    <!--| MAIN MENU |-->
    <ul class="side-menu">


        <li>
            <a href ="{{ url('/') }}">
                <i class="zmdi zmdi-home"></i>
                <span>หน้าแรก</span>
            </a>
        </li>
        <li class="active">
            <a href="">
                <i class="zmdi zmdi-account-add"></i>
                <span>ลงทะเบียนผู้สอน<span class="label label-danger">New</span></span>
            </a>
        </li>


    </ul>
</aside>
@else
    <aside id="sidebar">

        <!--| MAIN MENU |-->
        <ul class="side-menu">
            <li class="sm-sub sms-profile">
                <a class="clearfix" href="">
                    <img src="https://mooc.rmu.ac.th/upload/instructor/" alt="">

                    <span class="f-11">
                        <span class="d-block">{{ Auth::user()->name }}</span>
                        <small class="text-lowercase">{{ Auth::user()->email }}</small>
                    </span>
                </a>


            </li>

            <li id="Dashboard">
                <a href="{{ url('instructor-dashboard') }}">
                    <i class="zmdi zmdi-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li id="curriculum">
                <a href="{{ url('instructor-ViewCourseAll') }}">
                    <i class="zmdi zmdi-format-underlined"></i>
                    <span>จัดการหลักสูตร<span class="label label-danger">New</span></span>
                </a>
            </li>


            <li class="sm-sub" id="MN">
                <a href="">
                    <i class="zmdi zmdi-folder zmdi-hc-fw"></i>
                    <span>จัดการข้อสอบ <span class="label label-warning">New</span></span>
                </a>
                <ul>
                    <li><a href="{{ url('/Pretest') }}">ข้อสอบก่อนเรียน</a></li>
                    <li><a href="{{ url('/Posttest') }}">ข้อสอบหลังเรียน</a></li>
                </ul>
            </li>
            {{--<li id="MNstudent">--}}
                {{--<a href="/Instructor/MNstudent">--}}
                    {{--<i class="zmdi zmdi-male-female zmdi-hc-fw"></i>--}}
                    {{--<span>จัดการข้อมูลนักเรียน</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li id="Profiles">--}}
                {{--<a href="/Instructor/Profile">--}}
                    {{--<i class="zmdi zmdi-account zmdi-hc-fw"></i>--}}
                    {{--<span>จัดการข้อมูลส่วนตัว</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li id="ResetPassword">--}}
                {{--<a href="h/Instructor/ResetPassword">--}}
                    {{--<i class="zmdi zmdi-refresh zmdi-hc-fw"></i>--}}
                    {{--<span>เปลี่ยนรหัสผ่าน</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power-setting zmdi-hc-fw"></i>
                    <span>ออกจากระบบ</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </aside>

@endif
@yield('content')

<footer id="footer">
    Copyright © 2018 mooc


</footer>


<!-- Javascript Libraries -->
<script src="{{ asset('pg/superflat/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('pg/superflat/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script src="{{ asset('pg/superflat/vendors/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/summernote/dist/summernote.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/th.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}"></script>

<script src="{{ asset('pg/superflat/vendors/chosen_v1.4.2/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/input-mask/input-mask.min.js') }}"></script>
<script src="{{ asset('pg/superflat/vendors/farbtastic/farbtastic.min.js') }}"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->

<script src="{{ asset('pg/superflat/js/functions.js') }}"></script>
<script src="{{ asset('pg/superflat/js/demo.js') }}"></script>
<script>
    $(function () {
        $('.html-editor').summernote({
            height: 150
        });
    });

</script>
<script src="{{ asset('pg/register_ajax.js') }}"></script>

@yield('js')
</body>
</html>