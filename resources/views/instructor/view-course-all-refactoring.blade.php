@extends('adminlte::page')

@section('content')
    <section id="content">
        <div class="container">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All courses</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="row mb-2">
                            <div class="text-center">
                                @if(Auth::user()->status == 1)
                                    <button type="button" class="btn btn-primary" onclick="addcourses()"><i class="far fa-plus-square"></i> Add a course</button>
                                @else
                                    <span>Can't add courses Because the user has not yet approved</span>
                                @endif
                            </div>
                    </div>


                        <!-- STACKED BAR CHART -->
                        <div class="card card-dark">
                            <div class="card-header">

                                <h3 class="card-title">courses</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart">

                                    <div class="row m-10">
                                        @foreach ($courses as $key)
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset('upload/img/'.$key->course_pic) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $key->course_name }}</h5>
                                            <p class="card-text">{{ $key->user->instructor->instructor_name}} {{ $key->user->instructor->instructor_skill}}</p>

                                            <div class="clearfix"></div>

                                            <a href="{{ url('viewcourse/'.$key->id) }}" type="button" class="btn btn-info"><i class="far fa-eye"></i> View</a>
                                            <a href="javascript:void(0)"
                                               onclick="delcourse('{{ $key->id }}', '{{ $key->course_name }}')"
                                               class="btn bg-danger  btn-icon-text"><i class="far fa-trash-alt"></i> Delete</a>



                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

                <!-- Modal Large -->
                <div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"> Add a course</h4>
                            </div>
                            <form name="f" action="{{ url('insert-course') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <p class="c-pink text-center">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. </p>
                                    <div class="row">
                                        <div class="col-sm-12 m-b-20">
                                            <div class="form-group">
                                                <p class="c-black">Course name</p>
                                                <input type="text" class="form-control" name="course_name"
                                                       maxlength="200"
                                                       placeholder="eg: Hacking Academy: Monitoring Transmitted Data"
                                                       required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 m-b-20">
                                            <div class="form-group">
                                                <p class="c-black">Description</p>
                                                <textarea class="form-control" name="course_about" maxlength="250"
                                                          placeholder="eg: Learn how to intercept data in your network. Monitor transmitted data and detect intrusion. Free hacking lesson."
                                                          required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 m-b-20">
                                            <p class="c-black">Language used</p>

                                            <select class="selectpicker" name="course_languages">
                                                <option value="Thai">Thai</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 m-b-20">
                                            <p class="c-black">This course is affiliated with the faculties.</p>

                                            <select class="selectpicker" name="faculty_id" required="required"
                                            >
                                                <option value="">Please select faculty</option>
                                                <option value="20">Science and technology</option>
                                                <option value="60">Islamic Studies</option>
                                                <option value="61">Education</option>
                                                <option value="70">Arts and Social Sciences</option>
                                            </select>
                                        </div>
                                        {{--<div class="col-sm-3 m-b-20">--}}
                                        {{--<p class="c-black">กลุ่มวิชา</p>--}}
                                        {{--<div id="course_programs_g">--}}
                                        {{--<select class="selectpicker" name="course_programs" id="course_programs"--}}
                                        {{--required="required">--}}
                                        {{--<option value="">กรุณาเลือกกลุ่มวิชา</option>--}}
                                        {{--</select>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="col-sm-3 m-b-20">
                                            <p class="c-black">Subject type</p>

                                            <select class="selectpicker" name="group_id" required="required">
                                                <option value="">Please select a course type</option>
                                                <option value="1">System development( Development )</option>
                                                <option value="2">Business( Business )</option>
                                                <option value="6">( Graphic Design )</option>
                                                <option value="13">( Islamic )</option>
                                                <option value="14">( Language )</option>
                                                <option value="15">( Another )</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">Exam before study</p>

                                            <select class="selectpicker" name="course_pretest">
                                                <option value="0">no exam before studying</option>
                                                <option value="1">Have exam before studying</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">Exam after study</p>

                                            <select class="selectpicker" name="course_posttest">
                                                <option value="0">no exam after studying</option>
                                                <option value="1">Have exam after studying</option>
                                            </select>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">Course start date</p>

                                            <div class="input-group form-group ">
                                                <span class="input-group-addon"><i
                                                        class="zmdi zmdi-calendar"></i></span>
                                                <div class="dtp-container">
                                                    <input type='date' class="form-control date-picker"
                                                           name="course_start" id="date_in" placeholder="Click here..."
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">Course closing date</p>

                                            <div class="input-group form-group ">
                                                <span class="input-group-addon"><i
                                                        class="zmdi zmdi-calendar"></i></span>
                                                <div class="dtp-container">
                                                    <input type='date' class="form-control date-picker"
                                                           name="course_end" id="date_out" placeholder="Click here..."
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-primary">Save data</button>

                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
    </section>


@stop

@section('js')
    @include('sweetalert::alert')
    <link href="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css') }}"
          rel="stylesheet">

    <script src="{{ asset('pg/superflat/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>




    <script>
        $(document).on('ready', function () {
            //document.getElementById("Dashboard").className = "active";
            $("#curriculum").addClass('active');
            $('.rating-loading').rating({
                displayOnly: true,
                step: 0.1

            });
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
            $("#date_in").on("dp.change", function (e) {
                $('#date_out').data("DateTimePicker").minDate(e.date);
            });
            $("#date_out").on("dp.change", function (e) {
                $('#date_in').data("DateTimePicker").maxDate(e.date);
            });
        });


        $(document).on('click', '.button', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('DeleteCourse') }}",
                        data: {id:id},
                        success: function (data) {
                            //
                        }
                    });
                });
        });





        function delcourse(id, name) {
            swal({
                title: "ยืนยันการลบข้อมูล?",
                text: "คุณต้องการลบ หลักสูตร" + name + " หรือไม่",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn bg-green',
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
        function addcourses() {
            $("#addcourse").modal({
                show: true
            });

        }
        function GetProgram(id) {
            if (id != "") {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/instructor-getProgram',
                    type: "get",
                    data: ({
                        _token: CSRF_TOKEN, id: id
                    }),
                    success: function (re) {
                        $("#course_programs_g").html(re);
                    }
                })
            } else {
                swal("กรุณาเลือก", "กรุณาเลือกสังกัดคณะ", "error");
            }
        }
    </script>
@stop
