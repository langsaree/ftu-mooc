@extends('adminlte::page')

@section('content')
    <section id="content">
        <div class="container">

            <!-- Main content -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('upload/img/'.$course->course_pic) }}"
                             alt="User profile picture">

                        <div class="pmo-stat">
                            <h2 class="m-0 c-white">{{ $students->count() }}</h2>
                            Students apply for membership
                        </div>

                    </div>


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Course details</b>
                        </li>
                        <li><i class="zmdi zmdi-flag zmdi-hc-fw"></i> {{ $course->course_name }}</li>
                        <li><i class="zmdi zmdi-label zmdi-hc-fw"></i> {{ $course->faculty->faculty_name }}</li>
                        <li><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> {{ $course->course_start }}</li>
                        <li><i class="zmdi zmdi-calendar-close zmdi-hc-fw"></i> {{ $course->course_end }}</li>

                    </ul>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-success">

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active  " href="#Information" data-toggle="tab">General information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Study" data-toggle="tab">Study program</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Learner</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="Information">

                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->

                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-success"></i>

                                        <div class="timeline-item">

                                            <h3 class="timeline-header"><a href="#">About the course</a> </h3>


                                            <div class="timeline-body">
                                                {!! $course->course_about !!}
                                            </div>

                                            <div class="timeline-footer">
                                                <a data-pmb-action="edit" href="#" class="btn btn-success btn-sm">modify</a>

                                            </div>

                                            <div class="pmbb-edit">

                                                <div class="fg-line">
                                                    <input type="hidden" id="course_id" value="{{ $course->id }}">
                                                    <textarea class="form-control" name="course_about" id="course_about"
                                                              rows="5" placeholder="About This Course..."
                                                              required="required"> {!! $course->course_about !!} </textarea>
                                                </div>
                                                <div class="m-t-10">
                                                    <button class="btn btn-primary btn-sm" type="submit"
                                                            onclick="UpdateAbout()">record
                                                    </button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">cancel</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">

                                            <h3 class="timeline-header border-0"><a href="#">Course goals</a>
                                            </h3>

                                            <div class="timeline-body">
                                                {!! $course->course_description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">

                                            <h3 class="timeline-header"><a href="#">General </a> information</h3>

                                            <div class="timeline-body">

                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt>Course name</dt>
                                                        <dd>{{ $course->course_name }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>language</dt>
                                                        <dd>{{ $course->course_languages }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Begin</dt>
                                                        <dd>{{ $course->course_start }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>End</dt>
                                                        <dd>{{ $course->course_end }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>price</dt>
                                                        @if($course->course_price == 0)
                                                            <dd><span class='label label-success'>FREE</span></dd>
                                                        @else
                                                            <dd><span class='label label-success'>{{ $course->course_price }}</span>
                                                            </dd>
                                                        @endif
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><a href="#">Group Information</a> </h3>
                                            <div class="timeline-body">
                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt>Category</dt>
                                                        <dd>{{ $course->faculty->faculty_name }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>category</dt>
                                                        <dd>{{ $course->group->group_nameen }}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><a href="#">Test</a> .</h3>
                                            <div class="timeline-body">
                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt>Test before study</dt>
                                                        <dd>
                                                            @if($course->course_pretest == 0)
                                                                <span class='c-red'>There is no test before study</span>
                                                            @else
                                                                <span class='c-green'>There is a test before study</span>
                                                            @endif
                                                        </dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Test after class</dt>
                                                        <dd>
                                                            @if($course->course_posttest == 0)
                                                                <span class='c-red'>No test after study</span>
                                                            @else
                                                                <span class='c-green'>There is a test after study</span>
                                                            @endif
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- study program -->
                        <div class="tab-pane" id="Study">

                                @include('instructor.curriculum-refactoring')

                        </div>


                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name-Surname</th>
                                            <th>email</th>
                                            <th>Percentage</th>
                                            <th>Study status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php

                                            $i = 1;

                                        @endphp
                                        @foreach ($students as $stu)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $stu->user->student->student_fullname  }}</td>
                                                <td>{{ $stu->user->email }}</td>
                                                <td></td>
                                                <td><span class="badge bg-success">Under study</span>
                                                </td>

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

@stop

                                @section('js')
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
                                            $("#course_start").on("dp.change", function (e) {
                                                $('#course_end').data("DateTimePicker").minDate(e.date);
                                            });
                                            $("#course_end").on("dp.change", function (e) {
                                                $('#course_start').data("DateTimePicker").maxDate(e.date);
                                            });
                                            $('.html-editor').summernote({
                                                height: 250
                                            });


                                            $('#example').dataTable({
                                                "sPaginationType": "full_numbers",
                                                "oLanguage": {
                                                    "sEmptyTable": "ไม่มีข้อมูลค่ะ",
                                                    "sInfo": "ข้อมูลทั้งหมด _TOTAL_ รายการที่จะแสดง [_START_ ถึง _END_]",
                                                    "sInfoEmpty": "ไม่มีรายการที่จะแสดง",
                                                    "sInfoFiltered": " จากข้อมูลทั้หมด _MAX_ แถว",
                                                    "sInfoPostFix": "",
                                                    "sInfoThousands": "'",
                                                    "sLengthMenu": 'show <select>' +
                                                        '<option value="10">10</option>' +
                                                        '<option value="20">20</option>' +
                                                        '<option value="30">30</option>' +
                                                        '<option value="40">40</option>' +
                                                        '<option value="50">50</option>' +
                                                        '<option value="80">80</option>' +
                                                        '<option value="100">100</option>' +
                                                        '<option value="-1">all</option>' +
                                                        '</select> row',
                                                    "sLoadingRecords": "กำลังดาวน์โหลดข้อมูล...",
                                                    "sProcessing": "กำลังทำงาน...",
                                                    "sSearch": "ค้นหา:",
                                                    "sZeroRecords": "ไม่พบข้อมูลที่ค้นหาในตารางค่ะ",
                                                    "oPaginate": {
                                                        "sFirst": "<i class='zmdi zmdi-arrow-left zmdi-hc-fw'></i>",
                                                        "sLast": "<i class='zmdi zmdi-arrow-right zmdi-hc-fw'></i>",
                                                        "sNext": "<i class='zmdi zmdi-caret-right-circle zmdi-hc-fw'></i>",
                                                        "sPrevious": "<i class='zmdi zmdi-caret-left-circle zmdi-hc-fw'></i>"
                                                    }
                                                }

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
                                        function UpdateAbout() {
                                            var course_id = $("#course_id").val();

                                            console.log(course_id);
                                            var course_about = $("#course_about").val();
                                            $.ajax({
                                                url: "{{ url('InstructorUpdateAbout') }}",
                                                type: "post",
                                                data: {
                                                    '_token': $('input[name=_token]').val(),
                                                    'id': course_id,
                                                    'course_about': course_about
                                                },
                                                success: function (data) {

                                                    swal("success", data.success, "success");
                                                    $('.btn-primary').on('click', function () {
                                                        location.reload();
                                                    });

                                                },
                                                error: function (error) {
                                                    swal(({
                                                        title: "เกิดข้อผิดพลาด",
                                                        text: "ไม่สามารถแก้ไขรายการได้",
                                                        icon: "error",
                                                        button: "Dismiss",
                                                    }));
                                                }
                                            });

                                        }
                                        function UpdateInformation() {
                                            var course_id = $("#course_id").val();
                                            $.ajax({
                                                url: "{{ url('InstructorUpdateInformation') }}",
                                                type: "post",
                                                data: {
                                                    '_token': $('input[name=_token]').val(),
                                                    'id': course_id,
                                                    'course_name': $("#course_name").val(),
                                                    'course_languages': $("#course_languages").val(),
                                                    'course_start': $("#course_start").val(),
                                                    'course_end': $("#course_end").val(),
                                                    'course_price': $("#course_price").val()
                                                },
                                                success: function (data) {

                                                    swal("success", data.success, "success");
                                                    $('.btn-primary').on('click', function () {
                                                        location.reload();
                                                    });

                                                },
                                                error: function (error) {
                                                    swal(({
                                                        title: "เกิดข้อผิดพลาด",
                                                        text: "ไม่สามารถแก้ไขรายการได้",
                                                        icon: "error",
                                                        button: "Dismiss",
                                                    }));
                                                }
                                            });
                                        }
                                        function GetProgram(id) {
                                            if (id != "") {
                                                $.ajax({
                                                    url: 'Instructor/GetProgram',
                                                    type: "post",
                                                    data: ({
                                                        id: id
                                                    }),
                                                    success: function (re) {
                                                        $("#course_programs_g").html(re);
                                                    }
                                                })
                                            } else {
                                                swal("กรุณาเลือก", "กรุณาเลือกสังกัดคณะ", "error");
                                            }
                                        }

                                        function SaveCourseQuiz() {
                                            var course_id = $("#course_id").val();
                                            $.ajax({
                                                url: "{{ url('InstructorUpdateCourseQuiz') }}",
                                                type: "post",
                                                data: {
                                                    '_token': $('input[name=_token]').val(),
                                                    'id': course_id,
                                                    'pretest': $("#course_pretest").val(),
                                                    'posttest': $("#course_posttest").val()
                                                },
                                                success: function (data) {

                                                    swal("success", data.success, "success");
                                                    $('.btn-primary').on('click', function () {
                                                        location.reload();
                                                    });

                                                },
                                                error: function (error) {
                                                    swal(({
                                                        title: "เกิดข้อผิดพลาด",
                                                        text: "ไม่สามารถแก้ไขรายการได้",
                                                        icon: "error",
                                                        button: "Dismiss",
                                                    }));
                                                }
                                            });
                                        }

                                        function SaveGroupInformation() {
                                            var course_id = $("#course_id").val();
                                            $.ajax({
                                                url: "{{ url('InstructorUpdateGroupInformation') }}",
                                                type: "post",
                                                data: {
                                                    '_token': $('input[name=_token]').val(),
                                                    'id': course_id,
                                                    'faculty_id': $("#faculty_id").val(),
                                                    'group_id': $("#group_id").val()
                                                },
                                                success: function (data) {

                                                    swal("success", data.success, "success");
                                                    $('.btn-success').on('click', function () {
                                                        location.reload();
                                                    });

                                                },
                                                error: function (error) {
                                                    swal(({
                                                        title: "เกิดข้อผิดพลาด",
                                                        text: "ไม่สามารถแก้ไขรายการได้",
                                                        icon: "error",
                                                        button: "Dismiss",
                                                    }));
                                                }
                                            });
                                        }
                                        function UpdateDescriptions() {
                                            var course_id = $("#course_id").val();
                                            $.ajax({
                                                url: "{{ url('InstructorUpdateDescription') }}",
                                                type: "post",
                                                data: {
                                                    '_token': $('input[name=_token]').val(),
                                                    'id': course_id,
                                                    'course_description': $("#course_description").val()
                                                },
                                                success: function (data) {

                                                    swal("success", data.success, "success");
                                                    $('.btn-success').on('click', function () {
                                                        location.reload();
                                                    });

                                                },
                                                error: function (error) {
                                                    swal(({
                                                        title: "เกิดข้อผิดพลาด",
                                                        text: "ไม่สามารถแก้ไขรายการได้",
                                                        icon: "error",
                                                        button: "Dismiss",
                                                    }));
                                                }
                                            });
                                        }
                                        function InsertSection() {
                                            var course_id = $("#course_id").val();
                                            if ($("#section_name").val() != "") {
                                                $.ajax({
                                                    url: "{{ url('InsertSection') }}",
                                                    type: "post",
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'course_id': course_id,
                                                        'section_name': $("#section_name").val(),
                                                        'section_title': $("#section_title").val(),
                                                        'section_number': 1
                                                    },
                                                    success: function (data) {

                                                        swal("success", data.success, "success");
                                                        $('.btn-primary').on('click', function () {
                                                            location.reload();
                                                        });

                                                    },
                                                    error: function (error) {
                                                        swal(({
                                                            title: "เกิดข้อผิดพลาด",
                                                            text: "ไม่สามารถแก้ไขรายการได้",
                                                            icon: "error",
                                                            button: "Dismiss",
                                                        }));
                                                    }
                                                });
                                            } else {
                                                swal("Errors", "Enter a title...", "error");
                                                $("#section_name").focus();
                                            }
                                        }
                                        function count_name() {

                                            var l = jQuery("#section_name").val().length;
                                            l = 100 - l;
                                            $("#dd").html(l);
                                        }

                                        function count_title() {
                                            var l = jQuery("#section_title").val().length;
                                            l = 250 - l;
                                            $("#tt").html(l);
                                        }
                                        function count_name1() {

                                            var l = jQuery("#section_name1").val().length;
                                            l = 100 - l;
                                            $("#dd1").html(l);
                                        }

                                        function count_title1() {
                                            var l = jQuery("#section_title1").val().length;
                                            l = 250 - l;
                                            $("#tt1").html(l);
                                        }
                                        function addlecture(id) {

                                            $("#addlecture").modal({
                                                show: true,
                                                remote: '{{ url('addlecture') }}' + '/'+ id
                                            });

                                        }
                                        function count_title_lecture() {
                                            var l = jQuery("#lecture_title").val().length;
                                            l = 80 - l;
                                            $("#tecture").html(l);
                                        }
                                        //Save Lecture
                                        function SaveLecture() {
                                            console.log('OK');
                                            if ($("#lecture_title").val() != "") {
                                                $.ajax({
                                                    url: "{{ url('saveLecture') }}",
                                                    type: "POST",
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'section_id': $("#section_id").val(),
                                                        'lecture_title': $("#lecture_title").val()
                                                    },
                                                    success: function (data) {

                                                        swal("success", data.success, "success");
                                                        $('.btn-primary').on('click', function () {
                                                            location.reload();
                                                        });

                                                    },
                                                    error: function (error) {
                                                        swal(({
                                                            title: "เกิดข้อผิดพลาด",
                                                            text: "ไม่สามารถแก้ไขรายการได้",
                                                            icon: "error",
                                                            button: "Dismiss",
                                                        }));

                                                    }
                                                });
                                            } else {
                                                swal("Errors", "Enter a title...", "error");
                                            }
                                        }
                                        //delete section
                                        function DeleteSection(id) {
                                            swal({
                                                title: "ยืนยันการลบข้อมูล?",
                                                text: "คุณต้องการลบหรือไม่",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: 'btn bg-pink',
                                                cancelButtonClass: 'btn bg-gray',
                                                confirmButtonText: "Yes, delete it!",
                                                closeOnConfirm: false
                                            }, function () {
                                                $.ajax({
                                                    url: '{{ url('DeleteSection') }}',
                                                    type: "post",
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'id': id
                                                    }
                                                });
                                                swal("ลบข้อมูล ", "เรียบร้อยแล้ว", "success");
                                                $('.btn-primary').on('click', function () {
                                                    location.reload();
                                                });
                                            });
                                        }

                                        //Delete Lecture
                                        function DeleteLecture(id) {
                                            swal({
                                                title: "ยืนยันการลบข้อมูล?",
                                                text: "คุณต้องการลบหรือไม่",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: 'btn bg-pink',
                                                cancelButtonClass: 'btn bg-gray',
                                                confirmButtonText: "Yes, delete it!",
                                                closeOnConfirm: false
                                            }, function () {
                                                $.ajax({
                                                    url: '{{ url('DeleteLecture') }}',
                                                    type: "post",
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'id': id
                                                    }
                                                });
                                                swal("ลบข้อมูล ", "เรียบร้อยแล้ว", "success");
                                                $('.btn-primary').on('click', function () {
                                                    location.reload();
                                                });
                                            });
                                        }

                                        //Edit Section
                                        function EditSection(id) {
                                            $("#EditSection").modal({
                                                show: true,
                                                remote: '{{ url('EditSection') }}' + '/'+ id

                                            });
                                        }

                                        //update section

                                        function InsertUpdateSection() {
                                            if ($("#section_name1").val() != "") {
                                                $.ajax({
                                                    url: "{{ url('InsertUpdateSection') }}",
                                                    type: "post",
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'id': $("#section_id1").val(),
                                                        'section_name': $("#section_name1").val(),
                                                        'section_title': $("#section_title1").val()
                                                    },
                                                    success: function (data) {

                                                        swal("success", data.success, "success");
                                                        $('.btn-primary').on('click', function () {
                                                            location.reload();
                                                        });

                                                    },
                                                    error: function (error) {
                                                        swal(({
                                                            title: "เกิดข้อผิดพลาด",
                                                            text: "ไม่สามารถแก้ไขรายการได้",
                                                            icon: "error",
                                                            button: "Dismiss",
                                                        }));

                                                    }
                                                });
                                            } else {
                                                swal("Errors", "Enter a title...", "error");
                                                $("#section_name").focus();
                                            }
                                        }

                                        //Upload Pic
                                        function UploadPic() {
                                            $("#UploadPic").modal({
                                                show: true
                                            });
                                        }
                                        function ViewLecture(id, code) {
                                            $("#ViewLecture").modal({
                                                show: true,
                                                remote: '?id=' + id + '&code=' + code
                                            });
                                        }

                                        function PublicCheck(id) {
                                            var l = id.split("#");
                                            console.log(l[0]);
                                            $.ajax({
                                                url: "{{ url('PublicCheck') }}",
                                                type: "post",
                                                data: {
                                                    '_token': $('input[name=_token]').val(),
                                                    'id': l[0]
                                                }
                                            });
                                        }
                                        function ViewArticle(id) {
                                            $("#ViewLecture").modal({
                                                show: true,
                                                remote: 'Instructor/ViewArticle?id=' + id
                                            });
                                        }
                                    </script>


@stop

