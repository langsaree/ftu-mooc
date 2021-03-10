@extends('layouts.admin')

@section('content')
    <section id="content">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">

                    <!-- Body Copy -->
                    <div class="tile">
                        <div class="t-header">
                            <div class="th-title">หลักสูตรทั้งหมด</div>
                            <div class="text-center">
                                @if(Auth::user()->status == 1)
                                    <button class="btn btn-info btn-icon-text" onclick="addcourses()"><i
                                            class="zmdi zmdi-border-color zmdi-hc-fw"></i> เพิ่มหลักสูตร
                                    </button>

                                @else
                                    <span>ไม่สามารถเพิ่มหลักสูตรได้ เนื่องจากผู้ใช้ยังไม่ได้อนุมัติ</span>

                                @endif
                            </div>
                        </div>

                        <div class="t-body ">
                            <div class="row m-10">
                                @foreach ($courses as $key)
                                    <div class="col-sm-6 col-md-3 m-t-20" style="height: 450px;">
                                        <div class="thumbnail">
                                            <img src="{{ asset('upload/img/'.$key->course_pic) }}"
                                                 style="width: 100%;height: 190px;" alt="" class="img-responsive">
                                            <div class="caption"
                                                 @if($key->course_approve=='0')
                                                 style="background-color: #e6e6e6;" @endif >
                                                <div style="height: 55px;width: 100%;">
                                                    <h4>{{ $key->course_name }}</h4>
                                                </div>
                                                <div class="m-t-5" style="height: 55px;width: 100%;">
                                                    <p>{{ $key->instructor_name}}  {{ $key->instructor_skill }}.</p>
                                                </div>

                                                <div class="clearfix"></div>

                                                <div class="m-t-10">
                                                    <a href="{{ url('viewcourse/'.$key->id) }}"
                                                       class="btn bg-blue btn-icon-text"><i class="zmdi zmdi-view-list"></i>Views</a>
                                                    <a href="javascript:void(0)"
                                                       onclick="delcourse('{{ $key->id }}', '{{ $key->course_name }}')"
                                                       class="btn bg-pink btn-icon-text"><i class="zmdi zmdi-close"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Large -->
                <div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">เพิ่มหลักสูตร</h4>
                            </div>
                            <form name="f" action="{{ url('insert-course') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <p class="c-pink text-center">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. </p>
                                    <div class="row">
                                        <div class="col-sm-12 m-b-20">
                                            <div class="form-group">
                                                <p class="c-black">ชื่อหลักสูตร</p>
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
                                                <p class="c-black">คำอธิบาย</p>
                                                <textarea class="form-control" name="course_about" maxlength="250"
                                                          placeholder="eg: Learn how to intercept data in your network. Monitor transmitted data and detect intrusion. Free hacking lesson."
                                                          required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3 m-b-20">
                                            <p class="c-black">ภาษาที่ใช้</p>

                                            <select class="selectpicker" name="course_languages">
                                                <option value="Thai">Thai</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 m-b-20">
                                            <p class="c-black">วิชานี้สังกัดคณะ</p>

                                            <select class="selectpicker" name="faculty_id" required="required"
                                            >
                                                <option value="">กรุณาเลือกสังกัดคณะ</option>
                                                <option value="20">วิทยาศาสตร์และเทคโนโลยี</option>
                                                <option value="60">อิสลามศึกษา</option>
                                                <option value="61">ศึกษาศาสตร์</option>
                                                <option value="70">ศิลปศาสตร์และสังคมศาสตร์</option>
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
                                            <p class="c-black">ประเภทวิชา</p>

                                            <select class="selectpicker" name="group_id" required="required">
                                                <option value="">กรุณาเลือกประเภทวิชา</option>
                                                <option value="1">พัฒนาระบบ( Development )</option>
                                                <option value="2">ธุระกิจ( Business )</option>
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
                                            <p class="c-black">สอบก่อนเรียน</p>

                                            <select class="selectpicker" name="course_pretest">
                                                <option value="0">ไม่มีการสอบก่อนเรียน</option>
                                                <option value="1">มีการสอบก่อนเรียน</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">สอบหลังเรียน</p>

                                            <select class="selectpicker" name="course_posttest">
                                                <option value="0">ไม่มีการสอบหลังเรียน</option>
                                                <option value="1">มีการสอบหลังเรียน</option>
                                            </select>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">วันที่เริ่มหลักสูตร</p>

                                            <div class="input-group form-group ">
                                                <span class="input-group-addon"><i
                                                        class="zmdi zmdi-calendar"></i></span>
                                                <div class="dtp-container">
                                                    <input type='text' class="form-control date-picker"
                                                           name="course_start" id="date_in" placeholder="Click here..."
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 m-b-20">
                                            <p class="c-black">วันที่ปิดหลักสูตร</p>

                                            <div class="input-group form-group ">
                                                <span class="input-group-addon"><i
                                                        class="zmdi zmdi-calendar"></i></span>
                                                <div class="dtp-container">
                                                    <input type='text' class="form-control date-picker"
                                                           name="course_end" id="date_out" placeholder="Click here..."
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-primary">บันทึกข้อมูล</button>
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">ยกเลิก
                                    </button>
                                </div>
                            </form>
                        </div>
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
