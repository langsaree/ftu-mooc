@extends('layouts.study')

@section('content')


    <div class="container-fluid">

        <div class="row">

            <div class="card-header w-100">

                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark"><i class="far fa-star color-success"></i>{{ $focusSection->section_name  }}</h6>

                    </div>

                    <div class="card-body">

                        <div class="card-body">
                            <div class="row">

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


                                                                            <hr class="sidebar-divider d-none d-md-block">
                                                                            <h3 class="header text-dark"><i class="fab fa-youtube"></i> video</h3>
                                                                            <div class="embed-responsive embed-responsive-16by9">

                                                                                <iframe  width="560" height="315" src="{{$lecture->youtube}}"
                                                                                        frameborder="0" allow="accelerometer; autoplay; clipboard-write;crypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                            </div>


                                                                            <!-- Line -->
                                                                            <hr class="sidebar-divider d-none d-md-block">


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
                                                                                    <td><a href="download/{{$lecture->pdf}}" download="{{$lecture->pdf}}"><button type="button" class="btn btn-dark"><i class="fas fa-download"></i> Download</button></a> </td>
                                                                                </tr>

                                                                                </tbody>
                                                                            </table>

                                                                            <h1>---------------------------------------------------</h1>



                                                                        </div>
                                                                        @endguest
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </section>
                        </div>
                    </div>
                </div>
            </div>







@endsection


