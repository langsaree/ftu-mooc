@extends('layouts.admin')

@section('content')
<section id="content">
    <div class="container">


        <div class="tile">
            <div class="t-header">
                <div class="th-title">อัพโหลดไฟล์ PDF <small></small></div>
            </div>

            <div class="t-body tb-padding">

                <div class="row m-10">

                </div>
                <form action="{{ url('UploadContentPdfFile') }}" method="post" id="upload_file" name="upload_file" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-l-10">
                        <br/>
                        <input type="hidden" name="lecture_id" id="lecture_id" value="{{ $lecture_id }}">
                        <input type="hidden" name="course_id" id="course_id" value="{{ $course_id }}">
                        <p class=" c-black m-b-20">ไฟล์ PDF  </p>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-primary btn-file m-r-10">
                                        <span class="fileinput-new">เลือกไฟล์</span>
                                        <span class="fileinput-exists">เปลี่ยน</span>
                                        <input type="file" name="pdf" name="pdf">
                                    </span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
                        </div>
                    </div>


                    <br>

                    <div class="row text-right m-10">
                        <button type="submit" class="btn btn-sm btn-primary" id="subpic">อัพโหลด</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>


        <!--Upload Pic000-->



        <!--ent modal-->

    </div>
</section>

@stop