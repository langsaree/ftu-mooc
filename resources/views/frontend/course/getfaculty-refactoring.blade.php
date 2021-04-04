@extends('layouts.menu')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ $fac->faculty_name }}</h1>

        <div class="row">

            <div class="card-header w-100">

                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark"><i class="far fa-star color-success"></i> COURSES</h6>
                    </div>
                    @if($course->count() > 0)
                        @foreach($course as $c)
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('upload/img/'.$c->course_pic) }}" alt="{{ $c->course_name }}" class="img-thumbnail  mx-auto d-block" >

                                        <h5 class="card-title">{{ $c->course_name }}</h5>
                                        <p class="card-text">{{ $c->faculty->faculty_name }}</p>
                                        <div class="team-footer">
                                            <small>Begin: {{ $c->course_start }} End: {{ $c->course_end }}  </small>
                                        </div>
                                        <a href="{{ url('course-view/'.$c->id) }}" class="btn btn-success">Start Study <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>  @endforeach

                    </div>
                        @else
                            <div class="alert alert-danger" role="alert"></div>
                            **** Course not found****

                        @endif

                    </div>
            </div>
        </div>

@stop
