@extends('layouts.admin')

@section('content')
    <section id="content">
        <div class="container">


            <div class="tile">
                <div class="t-header">
                    <div class="th-title">อัพโหลดลิงค์ Youbube <small></small></div>
                </div>

                <div class="t-body tb-padding">

                    <div class="row m-10">

                    </div>
                    <form action="{{ url('UploadContentYoutubeFile') }}" method="post" id="upload_file" name="upload_file" enctype="multipart/form-data">
                        @csrf
                        <div class="row m-l-10">
                            <br/>
                            <input type="hidden" name="lecture_id" id="lecture_id" value="{{ $lecture_id }}">
                            <input type="hidden" name="course_id" id="course_id" value="{{ $course_id }}">
                            <p class=" c-black m-b-20">ลิงค์ Youtube </p>

                            <input type="text" name="youtube" class="form-control" required="required"/>
                        </div>


                        <br>

                        <div class="row text-right m-10">
                            <button type="submit" class="btn btn-sm btn-primary" id="subpic">บันทึก</button>
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