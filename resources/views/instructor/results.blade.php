@extends('adminlte::page')

@section('content')

    <section id="content">
        <div class="container">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Results of Quiz</h1>
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
                            <h3 class="card-title">Results</h3>

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
                                    <th>Student name</th>
                                    <th>Course name</th>
                                    <th>Score</th>
                                    <th></th>
                                </tr>

                                <tr>
                                    <td>Hiyam</td>
                                    <td>Data</td>
                                    <td>0/10</td>
                                    <td><a href="#" class="btn btn-sm btn-primary btn-icon-text">View</a>
                                        <a href="#" class="btn btn-sm btn-info btn-icon-text">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger btn-icon-text">Delete</a>
                                    </td>
                                </tr>
                                </thead>

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

