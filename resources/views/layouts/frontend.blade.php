<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTUMooc</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e3b0f576bf.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>


</head>
<body>
<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
<nav class="navbar">
    <div class="max-width">
        <div class="logo"><a href="/">FTU<span>Mooc</span></a></div>
        @guest
        <ul class="menu">
            <li><a href="#home" class="menu-btn">Home</a></li>
            <li><a href="#about" class="menu-btn">About</a></li>
            <li><a href="#courses" class="menu-btn">Courses</a></li>
            <li><a href="#teams" class="menu-btn">Teams</a></li>
            <li><a href="{{ url('signin') }}" class="menu-btn">Sign in & Sign up</a></li>
            <li><a href="#contact" class="menu-btn">Contact</a></li>
            {{--<li><a href="{{ url('instructor-register') }}" class="menu-btn">For Teachers</a></li>--}}
        </ul>
        @else
            <ul class="menu">
                <img src="{{ Auth::User()->avatar }}" alt="pic" style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto;float:left; margin-right: 7px;">
                <li>
                    <a href="javascript:void(0)">Hello {{ Auth::User()->name }}</a></li>
                @if(Auth::user()->role_id == 1)
                    <li><a href="{{ url('myadmin') }}">Dashboard</a></li>
                    <li><a href="#about" class="menu-btn">About</a></li>
                    <li><a href="#courses" class="menu-btn">Courses</a></li>
                    <li><a href="#contact" class="menu-btn">Contact</a></li>
                    <li>
                    <div class="dropdown" >
                        <a class="btn  dropdown-toggle menu-btn " >Profile<i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content a" >
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                            </a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Log out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    </li>
                @elseif(Auth::user()->role_id == 2)
                    <li><a href="{{ url('instructor-dashboard') }}">Dashboard</a></li>
                    <li><a href="#about" class="menu-btn">About</a></li>
                    <li><a href="#courses" class="menu-btn">Courses</a></li>
                    <li><a href="#contact" class="menu-btn">Contact</a></li>
                    <li>
                        <div class="dropdown" >
                            <a class="btn  dropdown-toggle menu-btn " >Profile<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown-content a" >
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Log out</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @elseif(Auth::user()->role_id == 3)
                    <li><a href="{{ url('Mycourse') }}">My course</a></li>
                    <li><a href="#about" class="menu-btn">About</a></li>
                    <li><a href="#courses" class="menu-btn">Courses</a></li>
                    <li><a href="#contact" class="menu-btn">Contact</a></li>
                    <li>
                @endif

                    <div class="dropdown" >
                        <a class="btn  dropdown-toggle menu-btn " >Profile<i class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content a" >
                            <a class="dropdown-item" href="{{ url('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                            </a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Log out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </li>
            </ul><!-- .topbar-menu -->
        @endif
    </div>
</nav>

<!-- home section start -->
<section class="home" id="home">
    <div class="max-width">
        <div class="home-content">
            <div class="text-1">FTUMOOC</div>
            <div class="text-2" >Lifelong learning space for everyone</div>
            <div class="text-3">Welcome to <span class="typing"></span></div>
            <a class="btn btn-danger" href="{{url('get-faculties/20')}}">Study category</a>

             {{--<div class="dropdown">
                 <button class="dropbtn">Study category<i class="fas fa-caret-down"></i></button>
              <div class="dropdown-content a">
                     @php
                         $faculties = DB::table('faculties')->get();

                     @endphp
                     @foreach($faculties as $f)
                         <a href="{{ url('get-faculties/'.$f->id) }}">{{ $f->faculty_name }}</a>

                     @endforeach

                 </div>
            </div>--}}


        <img src="{{asset('svg/f3.png')}}" alt="..." class="move-me" >
    </div>
    </div>


</section>

<!-- about section start -->
<section class="about" id="about">
    <div class="max-width">
        <h2 class="title">About</h2>
        <div class="about-content">

            <img src="{{asset('svg/think.svg')}}" alt="..." class="move-me2" />

            <div class="column right">
                <div class="text">FTUMooc <span class="typing-2"></span></div>
                <p>Online learning courses on the site as it focuses on the teaching and learning of large groups of people in a free choice of courses.
                    Which accommodates a large number of learners, the content is open content that anyone can access.</p>
                <a href="#">More</a>
            </div>

        </div>
    </div>
</section>

<!-- courses section start -->
<section class="teams2" id="courses">
    <div class="max-width">
        <div class="carousel owl-carousel">
            @foreach($courses as $c)
                <div class="card">
                    <div class="box">
                        <a href ="{{ url('course-view/'.$c->id) }}" >
                            <img src="{{ asset('upload/img/'.$c->course_pic) }}" alt="{{ $c->course_name }}">
                            <div class="text">{{ $c->course_name }}</div>
                            <div class="text">{{ $c->faculty->faculty_name }}</div>
                            <div class="team-footer">
                                <small>begin: {{ $c->course_start }}   To: {{ $c->course_end }}  </small>
                            </div>
                        </a>
                    </div>
                </div>@endforeach
</section>



<!-- teams section start -->
<section class="teams" id="teams">
    <div class="max-width">
        <h2 class="title">My teams</h2>
        <div class="carousel owl-carousel">
            <div class="card">
                <div class="box">
                    <img src="{{asset('svg/h.jpg')}}" alt="">
                    <div class="text">Hiyam Sasu</div>
                    <p>Developer</p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <img src="{{asset('svg/k.jpg')}}" alt="">
                    <div class="text">Kholed Langsari</div>
                    <p>Developer</p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <img src="{{asset('svg/e.jpg')}}" alt="">
                    <div class="text">E-badiyah Jehsani</div>
                    <p>Developer</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact section start -->
<section class="contact" id="contact">
    <div class="max-width">
        <h2 class="title">Contact us</h2>
        <div class="contact-content">
            <div class="column left">
                <div class="text">Get in Touch</div>
                <p>If you are unable to access your account contact us via email</p>
                <div class="icons">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <div class="info">
                            <div class="head">Name</div>
                            <div class="sub-title">Kholed Langsari</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info">
                            <div class="head">Address</div>
                            <div class="sub-title">......</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <div class="head">Email</div>
                            <div class="sub-title">Kholed Langsari@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column right">
                <div class="text">Message me</div>
                <form action="#">
                    <div class="fields">
                        <div class="field name">
                            <input type="text" placeholder="Name" required>
                        </div>
                        <div class="field email">
                            <input type="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Topic" required>
                    </div>
                    <div class="field textarea">
                        <textarea cols="30" rows="10" placeholder="Message.." required></textarea>
                    </div>
                    <div class="button">
                        <button type="submit">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- footer section start -->
<footer>
    <span>.<a href="http://127.0.0.1:8000/">FTUMooc</a> | <span class="far fa-copyright"></span> 2020 All rights reserved.</span>
</footer>

<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
