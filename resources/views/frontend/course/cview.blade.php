@extends('layouts.frontend')
@section('content')

    <!-- slider -->
    <div id="masthead" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#masthead" data-slide-to="0" class="active"></li>

        </ol><!-- .carousel-indicators -->

        <div class="carousel-inner" role="listbox">
            <div class="item active" >

                <div class="carousel-caption">
                    <h3>{{ $course->course_name }}</h3>
                    <a href="javascript:void(0)" onclick="CheckRegister('{{ Auth::id() }}')"
                       class="btn btn-block btn-lg btn-square btn-bordered btn-secondary">Enroll</a>
                </div><!-- .carousel-caption -->

            </div><!-- .item -->

        </div><!-- .carousel-inner -->

        <a class="left carousel-control" href="#masthead" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a><!-- .carousel-control -->
        <a class="right carousel-control" href="#masthead" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a><!-- .carousel-control -->
    </div><!-- #masthead -->


    <!-- post-entry -->
    <div class="post-entry">
        <div class="container">
            <div class="row">

                <!-- contact-form -->
                <div class="col-md-8">

                    <article>
                        <div class="news-container">



                            <div class="news-image">

                            </div><!-- .news-image -->
                            <div class="news-entry">

                                <h3>About the course</h3>
                                <small><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                    Published {{ $course->course_published }}
                                    <span class="glyphicon glyphicon-globe"
                                          aria-hidden="true"></span> {{ $course->course_languages }}
                                </small>
                                <p>{{ $course->course_about }}</p>

                                <h3>Course goals</h3>
                                <p>{!! $course->course_description !!}</p>

                            </div><!-- .news-entry -->
                            <div class="news-entry">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div><h3>Learning program</h3></div>

                                        <div class="panel-group" id="accordion" role="tablist"
                                             aria-multiselectable="true">
                                            @foreach ($sections as $key)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" class="collapsed" data-toggle="collapse"
                                                               data-parent="#accordion" href="#{{ $key->id }}"
                                                               aria-expanded="true" aria-controls="collapseOne">
                                                                {{ $key->section_name }}
                                                                <span class="panel-nav fa fa-times-circle"></span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="{{ $key->id }}" class="panel-collapse collapse"
                                                         role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            {{ $key->section_title }}

                                                            <section class="widget widget_recent_entries">
                                                                <ul>

                                                                    @php
                                                                        //loop lecture

                                                                        $lecture = \App\Lecture::where('section_id',$key->id)->get();
                                                                    @endphp
                                                                    @foreach ($lecture as $lec)
                                                                        @guest
                                                                        <li>{{ $lec->lecture_name }}</li>
                                                                        <li>Watch video</li>
                                                                        @else
                                                                            <li>
                                                                                <a href="#{{ $lec->id }}" id="various1">{{ $lec->lecture_name }}</a>
                                                                                <div style="display: none;">
                                                                                    <div id="{{ $lec->id }}"
                                                                                         style="width:900px;height:550px;overflow:auto;">
                                                                                        {!! $lec->lecture_article  !!}
                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <li><a class="fancyboxYoutube"
                                                                                   href="{{ $lec->youtube }}">Watch video</a>
                                                                            </li>




                                                                            @endguest
                                                                            @endforeach

                                                                </ul>
                                                            </section><!-- .widget_recent_entries -->
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>

                                    </div><!-- .col-md-6 -->

                                </div><!-- .row -->

                            </div><!-- .news-footer -->

                        </div><!-- .news-container -->
                    </article>

                </div><!-- .col-md-6 -->
                <div class="col-md-4">
                    <section class="widget widget_about">
                        <div class="about-photo">
                            <img src="{{ asset('upload/img/'.$course->course_pic) }}"
                                 alt="{{ $course->course_name }}">
                        </div><!-- .about-photo -->
                        <div class="about-author">
                            <h3>The creator : {{ $course->user->instructor->instructor_name }}</h3>
                            <small>{{ $course->user->instructor->instructor_skill }}</small>
                        </div><!-- .about-author -->
                        <div class="about-bio">
                            <table class="table">


                                <tr>
                                    <td><i class="glyphicon glyphicon-xbt"></i>price</td>
                                    <td>
                                        @if ($course->course_price != 0)
                                            B.{{ $course->course_price }}
                                        @else
                                            <span class="label label-success">FREE</span>
                                        @endif
                                    </td>
                                </tr>
                                {{--<tr>--}}
                                {{--<td><i class="glyphicon glyphicon-link"></i> Review</td>--}}
                                {{--<td></td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td><i class="glyphicon glyphicon-globe"></i>language</td>
                                    <td>{{ $course->course_languages }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-calendar"></i>begin</td>
                                    <td>{{ $course->course_start }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-calendar"></i>End</td>
                                    <td>{{ $course->course_end }}</td>
                                </tr>
                            </table>

                            <ul class="social-icon">
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>

                            </ul>
                        </div><!-- .about-bio -->
                    </section><!-- .widget_about -->
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .post-entry -->

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             *   Examples - images
             */

            $("a#example1").fancybox();

            $("a#example2").fancybox({
                'overlayShow': false,
                'transitionIn': 'elastic',
                'transitionOut': 'elastic'
            });

            $("a#example3").fancybox({
                'transitionIn': 'none',
                'transitionOut': 'none'
            });

            $("a#example4").fancybox({
                'opacity': true,
                'overlayShow': false,
                'transitionIn': 'elastic',
                'transitionOut': 'none'
            });

            $("a#example5").fancybox();

            $("a#example6").fancybox({
                'titlePosition': 'outside',
                'overlayColor': '#000',
                'overlayOpacity': 0.9
            });

            $("a#example7").fancybox({
                'titlePosition': 'inside'
            });

            $("a#example8").fancybox({
                'titlePosition': 'over'
            });

            $("a[rel=example_group]").fancybox({
                'transitionIn': 'none',
                'transitionOut': 'none',
                'titlePosition': 'over',
                'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });

            /*
             *   Examples - various
             */

            $("#various1").fancybox({
                'titlePosition': 'inside',
                'transitionIn': 'none',
                'transitionOut': 'none'
            });

            $("#various2").fancybox();

            $("#various3").fancybox({
                'width': '75%',
                'height': '75%',
                'autoScale': false,
                'transitionIn': 'none',
                'transitionOut': 'none',
                'type': 'iframe'
            });

            $("#various4").fancybox({
                'padding': 0,
                'autoScale': false,
                'transitionIn': 'none',
                'transitionOut': 'none'
            });
            $(".fancyboxYoutube").fancybox({
                helpers: {
                    media: true
                },
                youtube: {
                    autoplay: 1, // enable autoplay
                    start: 47 // set start time in seconds (embed)
                }
            }); // fancybox
        });
    </script>
    <script>
        function CheckRegister(id) {
            console.log(id);
            console.log({{ $course->id }});
            if (id == "") {
                swal({
                    title: "ไม่สามารถลงทะเบียนเรียนได้",
                    text: "กรุณาลงชื่อเข้าก่อน",
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                swal({
                    title: "ยืนยันการลงทะเบียน",
                    text: "คุณต้องการลงทะเบียนเรียนหลักสูตรนี้หรือไม่",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, ยืนยันการลงทะเบียน",
                    cancelButtonText: "No, ยกเลิก",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '{{ url('RegisterCourse') }}',
                            type: "post",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'user_id': '{{ Auth::id()  }}',
                                'course_id': '{{ $course->id }}'
                            },
                            success: function (data) {
                                if (data.success == 1) {
                                    swal("ลงทะเบียนเรียบร้อยแล้ว", "คุณได้ลงทะเบียนเรียนหลักสูตรนี้เรียบร้อยแล้ว", "success");
                                } else {
                                    swal({
                                        title: "ลงทะเบียนเรียนแล้ว",
                                        text: "คุณได้ลงทะเบียนเรียนวิชานี้แล้ว",
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                }
                            }
                        });
                    }
                });
            }

        }
    </script>

@endsection
