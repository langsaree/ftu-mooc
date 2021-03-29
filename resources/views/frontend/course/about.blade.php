@extends('layouts.study')

@section('content')
<html>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>



        <div class="card border-success text-center">
            <div class="card-header text-white bg-success">{{ $focusSection->section_name  }}</div>
            <div class="card-body text-dark">



                <p class="card-text text-dark"></p>

                @php
                    //loop lecture

                    $lecture = \App\Lecture::where('section_id',$focusSection->id)->get();
                @endphp
                @foreach ($lecture as $lecture)
                    @guest

                    @else

        <section class="content text-left">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                         <h2 class="card-title text-dark "><i class="fas fa-book"></i><b> {{ $lecture->lecture_name }}</b></h2>


                                    <div class=" text-dark" id="{{ $lecture->id }}">
                                        {!! $lecture->lecture_article  !!}
                                    </div>



                          <h3 class="header text-dark"><i class="fab fa-youtube"></i> video</h3>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe width="560" height="315" src="{{$lecture->youtube}}"
                                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                                                    encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>

                        <h3 class="header text-dark"><i class="fas fa-file-pdf"></i> References</h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Uplode Date</th>
                                <th scope="col">Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$lecture->lecture_name}}</td>
                                <td>{{$lecture->updated_at}}</td>
                                <td><a href="download/{{$lecture->pdf}}"><button type="button" class="btn btn-dark"><i class="fas fa-download"></i> Downloade</button></a> </td>
                            </tr>
                            </tbody>
                        </table>
                        <h1>-----------------------------------------------------------------------------</h1>

                        @endguest
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        </div>
        </div>


@endsection


