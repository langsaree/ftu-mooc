<<<<<<< Updated upstream
@extends('adminlte::page')
=======

>>>>>>> Stashed changes

@section('content')
    <section id="content">
        <div class="container">
            <div class="row">


                <div class="col-sm-12">


                    <!-- Site Visitors -->

                    <div class="row m-t-0 p-0 m-b-25">
                        <div class="col-xs-3">
                            <div class="bg-amber brd-2 p-15">
                                <div class="c-white m-b-5 f-16">Student</div>
                                <h2 class="m-0 c-white f-300 text-center m-b-5">{{ $countStudent }}</h2>

                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="bg-blue brd-2 p-15">
                                <div class="c-white m-b-5 f-16">Courses</div>
                                <h2 class="m-0 c-white f-300 text-center m-b-5">{{ $countCourse }}</h2>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="bg-green brd-2 p-15">
                                <div class="c-white m-b-5 f-16">Lectures</div>
                                <h2 class="m-0 c-white f-300 text-center m-b-5">{{ $countLecture }}</h2>
                            </div>
                        </div>

                        <div class="col-xs-3">
                            <div class="bg-red brd-2 p-15">
                                <div class="c-white m-b-5 f-16">Reviews</div>
                                <h2 class="m-0 c-white f-300 text-center m-b-5">0</h2>
                            </div>
                        </div>
                    </div>



                    <!-- Recent Posts -->
                    <div class="tile">
                        <div class="t-header th-alt bg-lightblue m-b-15">
                            <div class="th-title">My Courses</div>

                            <div class="actions dropdown">
                                <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more"></i></a>

                                <ul class="dropdown-menu pull-right">
                                    <li><a href="">Refresh</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="t-body">
                            <div class="row m-10">
                                @foreach ($courses as $key)
                                <div class="col-sm-6 col-md-3" style="height: 450px;" >
                                    <div class="thumbnail">
                                        <img src="{{ asset('upload/img/'.$key->course_pic)  }}" style="width: 100%;height: 190px;"  alt="" class="img-responsive">
                                        <div class="caption">
                                            <div style="height: 55px;">
                                                <h4>{{ $key->course_name }}</h4>
                                            </div>
                                            <div class="m-t-5" style="height: 55px;">
                                                <p>{{ $key->user->instructor->instructor_name}} {{ $key->user->instructor->instructor_skill}}</p>
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="m-t-10">
<<<<<<< Updated upstream
                                                <a href="{{ url('viewcoursebyID-refactoring/'.$key->id) }}" class="btn bg-blue btn-icon-text"><i class="zmdi zmdi-view-list"></i>View</a>
=======
                                                <a href="{{ url('viewcourse/'.$key->id) }}" class="btn bg-blue btn-icon-text"><i class="zmdi zmdi-view-list"></i>View</a>
>>>>>>> Stashed changes
                                                <a href="javascript:void(0)" onclick="delcourse('{{ $key->id }}','{{ $key->course_name }}')" class="btn bg-pink btn-icon-text"><i class="zmdi zmdi-close"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <a class="view-more" href="{{ url('instructor-ViewCourseAll') }}"><i class="zmdi zmdi-refresh-sync zmdi-hc-fw"> </i>View more</a>
                    </div>



                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(document).on('ready', function () {
            //document.getElementById("Dashboard").className = "active";
            $("#Dashboard").addClass('active');
            $('.rating-loading').rating({
                displayOnly: true,
                step: 0.1

            });
        });
        function delcourse(id, name) {
            swal({
                title: "ยืนยันการลบข้อมูล?",
                text: "คุณต้องการลบ หลักสูตร" + name + " หรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn bg-pink',
                cancelButtonClass: 'btn bg-gray',
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: '{{ url('DeleteCourse') }}',
                    type: "post",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                    },
                });
                swal("ลบ หลักสูตร" + name + " เรียบร้อยแล้ว", "success");
                $('.btn-primary').on('click', function () {
                    location.reload();
                });
            });
        }
    </script>
    @stop
