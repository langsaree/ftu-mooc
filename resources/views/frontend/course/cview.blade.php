@extends('layouts.study')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $course->course_name }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                        <div class="row">
                            <div class="col-12">
                                <h4>About the course</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <span class="username">
                                            <a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Published {{ $course->course_published }}
                                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> {{ $course->course_languages }}</a>
                           </span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        {{ $course->course_about }}
                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h4>Course goals</h4>
                                <div class="post">
                                    <div class="user-block">

                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        {!! $course->course_description !!}
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h5>The creator :</h5><h4 class="text-success"><i class="fas fa-paint-brush"></i>{{ $course->user->instructor->instructor_name }}</h4>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Price</th>
                                    <td>@if ($course->course_price != 0)
                                            B.{{ $course->course_price }}
                                        @else
                                            <span class="p-2 mb-2 bg-success text-white">FREE</span>
                                        @endif</td>
                                </tr>
                                <tr>
                                    <th>Language</th>
                                    <td>{{ $course->course_languages }}</td>
                                </tr>
                                <tr>
                                    <th>Begin</th>
                                    <td>{{ $course->course_start }}</td>
                                </tr>
                                <tr>
                                    <th>End</th>
                                    <td>{{ $course->course_end }}</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>


    <!-- post-entry -->
    <div class="post-entry">
        <div class="container">
            <div class="row">

                <!-- contact-form -->
                <div class="col-md-8">

                    <article>
                        <div class="news-container">




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

