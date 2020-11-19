{{--@extends('layouts.admin')--}}
@extends('adminlte::page')

@section('content')

    <section id="content">
        <div class="container">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ผู้สอน</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
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
                                        <span class="badge bg-danger">รออนุมัติ</span>
                                    @else
                                        <span class="badge bg-warning">รออนุมัติ</span>
                                    @endif
                                </td>
                                <td>
                                    @if($key->status == 1)
                                        <a href="{{ url('status0/'.$key->id) }}" class="btn btn-sm btn-danger btn-icon-text"> ยกเลิกใช้งาน</a>
                                    @else
                                        <a href="{{ url('status1/'.$key->id) }}" class="btn btn-sm btn-success btn-icon-text"> อนุมัติใช้งาน</a>
                                    @endif

                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>


    </section>

@stop
