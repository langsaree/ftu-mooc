@extends('layouts.menu')

@section('content')
    <html>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>{{ $fac->faculty_name }}</h3>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>


    <section class="content">
        <div class="container-fluid">
    <div class="card" style="width: 18rem;">
        @if($course->count() > 0)
            @foreach($course as $c)
        <img class="card-img-top" src="{{ asset('upload/img/'.$c->course_pic) }}" alt="{{ $c->course_name }}" >
        <div class="card-body">
            <a href="{{ url('course-view/'.$c->id) }}">
            <h5 class="card-title">{{ $c->course_name }}</h5>
            <p class="card-text">{{ $c->faculty->faculty_name }}</p>
                <p class="card-text">{{ $c->course_name }}</p>
                <div class="team-footer">
                    <small>Begin: {{ $c->course_start }} End: {{ $c->course_end }}  </small>
                </div>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </a>
        </div> @endforeach
    </div>

    @else
        <div class="alert alert-danger" role="alert"></div>
            **** Course not found****

    @endif
    </div>
    </section>



@stop
