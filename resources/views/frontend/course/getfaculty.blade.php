@extends('layouts.menu')

@section('content')
    <!-- slider -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>{{ $fac->faculty_name }}</h2>
            </div><!-- .page-title -->
        </div><!-- .col-md-12 -->
    </div>

    <div class="team">
        <div class="container">
            <div class="row">
                @if($course->count() > 0)
                    @foreach($course as $c)
                        <div class="col-md-4">
                            <a href="{{ url('course-view/'.$c->id) }}">
                                <div class="pricing-container popular team-container " data-title="หลักสูตรใหม่">
                                    <div class="team-photo">
                                        <img src="{{ asset('upload/img/'.$c->course_pic) }}" alt="{{ $c->course_name }}"
                                             style="height:197px;">
                                    </div><!-- .team-photo -->
                                    <div class="team-title">
                                        <h4>{{ $c->course_name }}</h4>
                                        <small>{{ $c->faculty->faculty_name }}</small>
                                    </div><!-- .team-title -->
                                    <div class="team-info" style="height:50px;">
                                        <p>{{ $c->course_name }}</p>


                                    </div><!-- .team-info -->
                                    <hr/>
                                    <div class="team-footer">
                                        <small>เริ่ม: {{ $c->course_start }} ถึง: {{ $c->course_end }}  </small>
                                    </div>

                                </div><!-- .team-container -->
                            </a>
                        </div><!-- .col-sm-4 -->
                    @endforeach

                @else
                            <div class="alert alert-danger text-center">**** ไม่พบหลักสูตร </div>
                @endif


            </div><!-- .row -->

        </div><!-- .container -->
    </div><!-- .team -->

@stop
