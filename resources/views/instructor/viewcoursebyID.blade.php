@extends('layouts.admin')

@section('content')
    <section id="content">
        <div class="container">



            <div class="tile" id="profile-main">
                <div class="pm-overview c-overflow-dark">
                    <div class="pmo-pic">
                        <div class="p-relative">
                            <a href="">
                                <img class="img-responsive" src="{{ asset('upload/img/'.$course->course_pic) }}" alt="">
                            </a>

                            <div class="dropdown pmop-message">
                                <a data-toggle="dropdown" href="" class="pmopm-send">
                                    <i class="zmdi zmdi-comment-text-alt"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <textarea placeholder="Write something..."></textarea>

                                    <button class="btn bg-green btn-icon"><i class="zmdi zmdi-mail-send"></i></button>
                                </div>
                            </div>

                            <a href="javascript:void(0)" onclick="UploadPic()" class="pmop-edit">
                                <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Update pictures</span>
                            </a>
                        </div>


                        <div class="pmo-stat">
                            <h2 class="m-0 c-white">{{ $students->count() }}</h2>
                            Students apply for membership
                        </div>
                    </div>

                    <div class="pmo-block pmo-contact hidden-xs">
                        <h2>Course details</h2>

                        <ul>

                            <li><i class="zmdi zmdi-flag zmdi-hc-fw"></i> {{ $course->course_name }}
                            </li>
                            <li><i class="zmdi zmdi-label zmdi-hc-fw"></i> {{ $course->faculty->faculty_name }}</li>
                            <li><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> {{ $course->course_start }}</li>
                            <li><i class="zmdi zmdi-calendar-close zmdi-hc-fw"></i> {{ $course->course_end }}</li>

                        </ul>
                    </div>


                </div>

                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active"><a href="#Information" aria-controls="Information" role="tab"
                                              data-toggle="tab" aria-expanded="true">General information</a></li>
                        <li><a href="#Curriculum" aria-controls="Curriculum" role="tab" data-toggle="tab">Study program</a>
                        </li>
                        <li><a href="#Student" aria-controls="Student" role="tab" data-toggle="tab">Learner</a></li>
                    </ul>

                    <div class="tab-content">
                        <!--start Tab Information-->
                        <div id="Information" role="tabpanel" class="tab-pane active">
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-comment-more zmdi-hc-fw m-r-5"></i>About the course</h2>

                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">modify</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        {!! $course->course_about !!}
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

                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-assignment zmdi-hc-fw m-r-5"></i>Course goals</h2>

                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">modify</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        {!! $course->course_description !!}
                                    </div>

                                    <div class="pmbb-edit">

                                        <div class="fg-line">
                                            <input type="hidden" id ="course_id" value="{{ $course->id }}"/>
                                            <textarea class="html-editor" name="course_description"
                                                      id="course_description" rows="5"
                                                      placeholder="Course Descriptions..."
                                                      required="required">{!! $course->course_description !!}</textarea>
                                        </div>
                                        <div class="m-t-10">
                                            <button class="btn btn-primary btn-sm" onclick="UpdateDescriptions()">save
                                            </button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> General information</h2>

                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">modify</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Course name</dt>
                                            <dd>{{ $course->course_name }}
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>language</dt>
                                            <dd>
                                                {{ $course->course_languages }}
                                            </dd>
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

                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Course name</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control"
                                                           placeholder="ชื่อหลักสูตร" name="course_name"
                                                           id="course_name"
                                                           value="{{ $course->course_name }}">
                                                </div>

                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">language</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control" name="course_languages"
                                                            id="course_languages">
                                                        <option value="Thai"
                                                                @if($course->course_languages == "Thai") selected @endif>
                                                            Thai
                                                        </option>
                                                        <option value="English"
                                                                @if($course->course_languages == "English") selected @endif>
                                                            English
                                                        </option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">begin</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input type='text' class="form-control date-picker"
                                                           name="course_start" id="course_start" data-toggle="dropdown"
                                                           placeholder="Click here..."
                                                           value="{{ $course->course_start }}">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">End</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input type='text' class="form-control date-picker"
                                                           name="course_end" id="course_end" data-toggle="dropdown"
                                                           placeholder="Click here..."
                                                           value="{{ $course->course_end }}">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">price</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input type="hidden" id="course_id" value="{{ $course->id }}">
                                                    <input type='number' class="form-control" min="0" max="99999"
                                                           name="course_price" id="course_price" data-toggle="dropdown"
                                                           placeholder="0" value="{{ $course->course_price }}">
                                                </div>
                                            </dd>
                                        </dl>

                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" onclick="UpdateInformation()">save
                                            </button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-assignment-o zmdi-hc-fw m-r-5"></i> Group Information</h2>

                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">modify</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
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


                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Category</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control" name="faculty_id"
                                                            id="faculty_id">
                                                        @foreach($faculties as $fac)
                                                            <option value="{{ $fac->id }}"
                                                                    @if($fac->id == $course->faculty_id)
                                                                    selected
                                                                @endif
                                                            >{{ $fac->faculty_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>

                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">category</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type = "hidden" id = "course_id" value="{{ $course->id }}">
                                                    <select class="form-control" name="group_id" id="group_id">
                                                        @foreach($groups as $group)
                                                            <option value="{{ $group->id }}"
                                                                    @if($group->id == $course->group_id)
                                                                    selected
                                                                @endif
                                                            >{{ $group->group_nameen }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>


                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" onclick="SaveGroupInformation()">
                                                save
                                            </button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-chart zmdi-hc-fw m-r-5"></i>Test</h2>

                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">modify</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
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
                                            <dd>
                                                @if($course->course_posttest == 0)
                                                    <span class='c-red'>No test after study</span>
                                                @else
                                                    <span class='c-green'>There is a test after study</span>
                                                @endif
                                            </dd>
                                            </dd>
                                        </dl>


                                    </div>


                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Test before study</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type = "hidden" id = "course_id" value="{{ $course->id }}">
                                                    <select class="form-control" name="course_pretest"
                                                            id="course_pretest">

                                                        <option value="0" @if($course->course_pretest == 0) selected @endif>ไม่มีการทอดสอบก่อนเรียน</option>
                                                        <option value="1" @if($course->course_pretest == 1) selected @endif>มีการทอดสอบก่อนเรียน
                                                        </option>

                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Test after study</dt>
                                            <dd>
                                                <div class="fg-line" id="course_programs_g">
                                                    <select class="form-control" name="course_posttest"
                                                            id="course_posttest">

                                                        <option value="0" @if($course->course_posttest == 0) selected @endif>ไม่มีการทอดสอบหลังเรียน
                                                        </option>
                                                        <option value="1" @if($course->course_posttest == 1) selected @endif>มีการทอดสอบหลังเรียน</option>

                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>


                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm"
                                                    onclick="SaveCourseQuiz()">
                                                save
                                            </button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <!--End Tab Information-->

                        <!--start Tab curriculum-->
                        <div role="tabpanel" class="tab-pane" id="Curriculum">
                            <h2 class="text-center">Study program</h2>
                            @include('instructor.curriculum')

                        </div>

                        <!--end Tab curriculum-->

                        <!--start Tab student-->
                        <div role="tabpanel" class="tab-pane" id="Student">
                            <div class="row m-10">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>order</th>
                                        <th>Name-Surname</th>
                                        <th>email</th>
                                        <th>Percentage</th>
                                        <th>Study status</th>
                                        {{--<th>ตัวเลือก</th>--}}
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
                                            <td><span class="label label-success">Under study</span>
                                            </td>
                                            {{--<td>--}}
                                            {{--<div class="dropdown">--}}
                                            {{--<a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown">ตัวเลือก</a>--}}
                                            {{--<ul class="dropdown-menu pull-left">--}}
                                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">ดูข้อมูลนักเรียน</a></li>--}}
                                            {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">ดูข้อมูลการสอบ</a></li>--}}
                                            {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--</td>--}}
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end Tab student-->


                    </div>
                </div>
            </div>

            <!--start modal-->
            <div class="modal fade" id="addlecture" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <div class="modal fade" id="EditSection" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <div class="modal fade" id="ViewLecture" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                    </div>
                </div>
            </div>

            <!--Upload Pic000-->

            <div class="modal fade" id="UploadPic" tabindex="-1" role="dialog" aria-hidden="true"
                 style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ url('InstructorUploadPic/'.$course->id) }}" method="post" id="upload_file"
                              name="upload_file" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="modal-header">
                                <h4 class="modal-title">image</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="thumbnail">
                                            <img class="img-responsive"
                                                 src="{{ asset('upload/img/'.$course->course_pic) }}" alt="">

                                        </div>
                                    </div>
                                </div>
                                <div class="row m-l-10">

                                </div>
                                <div class="row m-l-10">
                                    <br/>
                                    <input type="hidden" name="id_s" id="id_s" value="{{ $course->id }}">
                                    <input type="hidden" name="id" id="id" value="{{ $course->id }}">
                                    <input type="hidden" name="id_pic" id="id_code" value="{{ $course->course_pic }}">
                                    <p class=" c-black m-b-20">Picture show</p>

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new">Select picture</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="pic" id="pic">
                                            </span>
                                            <a href="#" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">move</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary" id="subpic">Save changes</button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--ent modal-->

        </div>
    </section>
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
