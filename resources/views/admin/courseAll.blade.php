@extends('layouts.frontend')

@section('content')
    <!-- slider -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>หลักสูตรทั้งหมด</h2>
            </div><!-- .page-title -->
        </div><!-- .col-md-12 -->
    </div>

    <!-- team -->
    <div class="team">
        <div class="container">
            <div class="row">
                @foreach ($courses as $key)
                    <div class="col-md-4">
                        <a href="{{ url('course-view',['id'=>$key->course_id]) }}">
                            <div class="pricing-container popular team-container " data-title="">
                                <div class="team-photo">
                                    <img src="{{ asset('upload/img/'.$key->course->course_pic)  }}"
                                         alt="{{ $key->course->course_name }}" style="height:197px;">
                                </div><!-- .team-photo -->
                                <div class="team-title">
                                    <h4>{{ $key->course->course_name }}</h4>
                                    <small>{{ $key->course->faculty->faculty_name }}</small>
                                </div><!-- .team-title -->
                                <div class="team-info" style="height:50px;">
                                    <p>{{ $key->course->course_name }}</p>

                                </div><!-- .team-info -->
                                <hr/>
                                <div class="team-footer">
                                    <small>เริ่ม: {{ $key->course->course_start }}
                                        ถึง: {{ $key->course->course_end }}
                                    </small>
                                </div>

                            </div><!-- .team-container -->
                        </a>
                    </div><!-- .col-sm-4 -->

                @endforeach

            </div><!-- .row -->


        </div><!-- .container -->
    </div><!-- .team -->
    <!-- team -->
@stop