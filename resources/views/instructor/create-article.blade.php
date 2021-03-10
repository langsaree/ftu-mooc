@extends('adminlte::page')

@section('content')

    <section id="content">
        <div class="card" style="width: 60rem;">
            <div class="card-body">
        <div class="container">


            <div class="tile">
                <div class="t-header">
                    <div class="th-title">Upload articles <small></small></div>
                </div>

                <div class="t-body tb-padding">

                    <div class="row m-10">

                    </div>
                    <form action="{{ url('UploadContentArticleFile') }}" method="post" id="upload_file" name="upload_file" enctype="multipart/form-data">
                        @csrf
                        <div class="row m-l-10">
                            <br/>
                            <input type="hidden" name="lecture_id" id="lecture_id" value="{{ $lecture_id }}">
                            <input type="hidden" name="course_id" id="course_id" value="{{ $course_id }}">
                            <p class=" c-black m-b-20">material </p>
                            <br>



                        </div>
                        <textarea class="form-control" id="summary-ckeditor" name="article"></textarea>

                        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                        <script>
                            CKEDITOR.replace( 'summary-ckeditor' );
                        </script>

                        <br>

                        <div class="row text-right m-10">
                            <button type="submit" class="btn btn-sm btn-primary" id="subpic">Save</button>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>


            <!--Upload Pic000-->



            <!--ent modal-->

        </div>
            </div>
        </div>
    </section>

@stop
