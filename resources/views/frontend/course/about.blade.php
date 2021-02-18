@extends('layouts.study')

@section('content')
<html>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>



        <div class="card border-success text-center">
            <div class="card-header text-white bg-success">{{ $focusSection->section_name  }}</div>
            <div class="card-body text-success">



                <p class="card-text text-dark"></p>

                @php
                    //loop lecture

                    $lecture = \App\Lecture::where('section_id',$focusSection->id)->get();
                @endphp
                @foreach ($lecture as $lecture)
                    @guest

                    @else
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="card-title text-success">{{ $lecture->lecture_name }}</h2>

                                <i class="fas fa-book-open"></i>
                                    <div class="body text-dark" id="{{ $lecture->id }}">
                                        {!! $lecture->lecture_article  !!}
                                    </div>


                                    <i class="fas fa-video bg-maroon"></i>
                                    <h3 class="header">video</h3>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe width="560" height="315" src="{{$lecture->youtube}}"
                                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                                                    encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>

                        @endguest
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        </div>
        </div>


@endsection


