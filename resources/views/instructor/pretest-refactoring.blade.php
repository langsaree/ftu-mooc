@extends('adminlte::page')

@section('content')

<section id="content">
    <div class="container">


        <div class="tile">
            <div class="t-header">
                <div class="th-title">จัดการข้อสอบก่อนเรียน <small></small></div>
            </div>

            <div class="t-body tb-padding">

                <div class="row m-l-10">

                    <div class="m-7">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>รหัสหลักสูตร</th>
                                <th>ชื่อหลักสูตร</th>
                                <th>กลุ่มวิชา</th>
                                <th>ตัวเลือก</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($course as $key){?>
                            <tr>
                                <td>{{ $key->id }}</td>
                                <td>{{ $key->course_name }}</td>
                                <td>{{ $key->group->group_nameen }}</td>
                                <td><a href="instructor/AddPosttest" class="btn btn-info btn-icon-text"><i class="zmdi zmdi-apps"></i> เพิ่มข้อสอบ</a></td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>


        <!--Upload Pic000-->



        <!--ent modal-->

    </div>
</section>

@stop