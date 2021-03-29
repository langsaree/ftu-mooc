@extends('adminlte::page')


@section('content')
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <!-- Site Visitors -->

                    <div class="row m-t-0 p-0 m-b-25">

                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $countStudent }}</h3>

                                    <p>Student</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $countLecture }}</h3>

                                    <p>Lectures</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $countCourse }}</h3>

                                    <p>Courses</p>

                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Reviews</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                    <!-- .card-body -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Courses</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart">

                                <div class="row m-10">
                                    @foreach ($courses as $key)
                                        <div class="card" style="width: 18rem;">
                                            <img src="{{ asset('upload/img/'.$key->course_pic) }}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $key->course_name }}</h5>
                                                <p class="card-text">{{ $key->user->instructor->instructor_name}} {{ $key->user->instructor->instructor_skill}}</p>

                                                <div class="clearfix"></div>

                                                <a href="{{ url('viewcourse/'.$key->id) }}" type="button" class="btn btn-info"><i class="far fa-eye"></i> View</a>
                                                <a href="javascript:void(0)" onclick="delcourse('{{ $key->id }}','{{ $key->course_name }}')"  type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </section>
@stop

@section('js')

    @include('sweetalert::alert')
    <link href="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css') }}"
          rel="stylesheet">

    <script src="{{ asset('pg/superflat/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>


    <script>
        $(document).on('ready', function () {
            //document.getElementById("Dashboard").className = "active";
            $("#Dashboard").addClass('active');
            $('.rating-loading').rating({
                displayOnly: true,
                step: 0.1

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
    </script>
@stop
