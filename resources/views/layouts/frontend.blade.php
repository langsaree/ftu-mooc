<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Website</title>
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
        <div class="logo"><a href="#">FTU<span>Mooc</span></a></div>
        @guest
        <ul class="menu">
            <li><a href="#home" class="menu-btn">Home</a></li>
            <li><a href="#about" class="menu-btn">About</a></li>
            <li><a href="#courses" class="menu-btn">Courses</a></li>
            <li><a href="#teams" class="menu-btn">Teams</a></li>
            <li><a href="{{ url('signin') }}" class="menu-btn">Sign in & Sign up</a></li>
            <li><a href="#contact" class="menu-btn">Contact</a></li>
            <li><a href="{{ url('instructor-register') }}" class="menu-btn">For Teachers</a></li>
        </ul>
        @else
            <ul class="menu">
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
    </div>
</nav>

<!-- home section start -->
<section class="home" id="home">
    <div class="max-width">
        <div class="home-content">
            <div class="text-1"><img src="{{asset('svg/ftu.png')}}" width="250" /></div>
            <div class="text-2" >Lifelong learning space for everyone</div>
            <div class="text-3">Welcome to <span class="typing"></span></div>
            <div class="dropdown">
                <button class="dropbtn">Study category<i class="fas fa-caret-down"></i></button>
                <div class="dropdown-content a">
                    @php
                        $faculties = DB::table('faculties')->get();

                    @endphp
                    @foreach($faculties as $f)
                        <a href="{{ url('get-faculties/'.$f->id) }}">{{ $f->faculty_name }}</a>

                    @endforeach

                </div>
            </div>
        <img src="{{asset('svg/book.svg')}}" alt="..." class="move-me" >
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
                <div class="text">..... <span class="typing-2"></span></div>
                <p>.......</p>
                <a href="#">.....</a>
            </div>

        </div>
    </div>
</section>

<!-- courses section start -->
<section class="services" id="courses">
    <div class="max-width">

        <h2 class="title">Courses</h2>
        @foreach($courses as $c)
            <div class="serv-content">
                <div class="card">
                    <a href ="{{ url('course-view/'.$c->id) }}" >
                        <div class="box">
                            <i class="fas fa-paint-brush"></i>
                            <div class="text">{{ $c->course_name }}</div>
                            <small>{{ $c->faculty->faculty_name }}</small>
                        </div>

                        <div class="team-footer">
                            <small>begin: {{ $c->course_start }}   To: {{ $c->course_end }}  </small>
                        </div>
                    </a>
                </div>

            </div> @endforeach
    </div>



</section>

<!-- skills section start
<section class="skills" id="skills">
    <div class="max-width">
        <h2 class="title">My skills</h2>
        <div class="skills-content">
            <div class="column left">
                <div class="text">My creative skills & experiences.</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, ratione error est recusandae consequatur, iusto illum deleniti quidem impedit, quos quaerat quis minima sequi. Cupiditate recusandae laudantium esse, harum animi aspernatur quisquam et delectus ipsum quam alias quaerat? Quasi hic quidem illum. Ad delectus natus aut hic explicabo minus quod.</p>
                <a href="#">Read more</a>
            </div>
            <div class="column right">
                <div class="bars">
                    <div class="info">
                        <span>HTML</span>
                        <span>90%</span>
                    </div>
                    <div class="line html"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>CSS</span>
                        <span>60%</span>
                    </div>
                    <div class="line css"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>JavaScript</span>
                        <span>80%</span>
                    </div>
                    <div class="line js"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>PHP</span>
                        <span>50%</span>
                    </div>
                    <div class="line php"></div>
                </div>
                <div class="bars">
                    <div class="info">
                        <span>MySQL</span>
                        <span>70%</span>
                    </div>
                    <div class="line mysql"></div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- teams section start -->
<section class="teams" id="teams">
    <div class="max-width">
        <h2 class="title">My teams</h2>
        <div class="carousel owl-carousel">
            <div class="card">
                <div class="box">
                    <img src="" alt="">
                    <div class="text">Someone name</div>
                    <p>1</p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <img src="" alt="">
                    <div class="text">Someone name</div>
                    <p>2</p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <img src="" alt="">
                    <div class="text">Someone name</div>
                    <p>3.</p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <img src="" alt="">
                    <div class="text">Someone name</div>
                    <p>4</p>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <img src="" alt="">
                    <div class="text">Someone name</div>
                    <p>5</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact section start -->
<section class="contact" id="contact">
    <div class="max-width">
        <h2 class="title">Contact me</h2>
        <div class="contact-content">
            <div class="column left">
                <div class="text">Get in Touch</div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p>
                <div class="icons">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <div class="info">
                            <div class="head">Name</div>
                            <div class="sub-title">Prakash Shahi</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info">
                            <div class="head">Address</div>
                            <div class="sub-title">Surkhet, Nepal</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <div class="head">Email</div>
                            <div class="sub-title">abc@gmail.com</div>
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
                        <input type="text" placeholder="Subject" required>
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
