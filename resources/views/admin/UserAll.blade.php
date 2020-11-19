@extends('layouts.admin')


@section('content')

    <section id="content">
        <div class="container">
            <div class="tile">
                <div class="t-header">
                    <div class="th-title">ผู้สอน
                        <small></small>
                    </div>
                </div>

                <div class="t-body tb-padding">

                    <div class="row m-l-10">

                        <div class="m-7">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ</th>
                                    <th>อีเมล</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($users as $key){?>
                                <tr>
                                    <td>{{ $key->id }}</td>
                                    <td>{{ $key->name }}</td>
                                    <td>{{ $key->email }}</td>
                                    <td>
                                        @if($key->status == 0)
                                                <span class="alert-danger">รออนุมัติ</span>
                                            @else
                                            <span class="alert-success">อนุมัติ</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($key->status == 1)
                                        <a href="{{ url('status0/'.$key->id) }}" class="btn btn-danger btn-icon-text"><i
                                                    class="zmdi zmdi-apps"></i> ยกเลิกใช้งาน</a>
                                            @else
                                            <a href="{{ url('status1/'.$key->id) }}" class="btn btn-success btn-icon-text"><i
                                                        class="zmdi zmdi-apps"></i> อนุมัติใช้งาน</a>
                                        @endif

                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </section>

@stop
