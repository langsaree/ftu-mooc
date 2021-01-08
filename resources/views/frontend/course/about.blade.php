@extends('layouts.study')

@section('content')
<html>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>{{ $focusSection->section_name  }}</h3>
                        <h2>{{ $lecture->lecture_name }}</h2>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">



                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><a href="#"></a></h3>

                                    <div class="timeline-body">
                                        {!! $lecture->lecture_article  !!}
                                    </div>

                                </div>
                            </div>


                            <div>
                                <i class="fas fa-video bg-maroon"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><a href="#"></a> video</h3>

                                    <div class="timeline-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{$lecture->youtube}} " frameborder="0" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection


