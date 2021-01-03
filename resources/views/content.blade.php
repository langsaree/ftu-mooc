@extends('layouts.frontend')

@section('content')

    <!-- slider -->
    <div id="masthead" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#masthead" data-slide-to="0" class="active"></li>

        </ol><!-- .carousel-indicators -->

        <div class="carousel-inner" role="listbox">
            <div class="item active" style="background-image: url('{{ asset('style/img/bg.jpeg') }}')">
                <a href="">
                    <div class="carousel-caption">
                        <h3>Welcome to FTUMOOC</h3>
                        <p>รวบรวมผู้เชี่ยวชาญในแต่ละสาขามาสอนที่ทำให้ทุกคนสามารถเรียนรู้และพัฒนาทักษะได้อย่างสะดวก ไม่ว่าที่ไหนและเมื่อไร</p>
                    </div><!-- .carousel-caption -->
                </a>
            </div><!-- .item -->

        </div><!-- .carousel-inner -->

        <a class="left carousel-control" href="#masthead" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a><!-- .carousel-control -->
        <a class="right carousel-control" href="#masthead" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a><!-- .carousel-control -->
    </div><!-- #masthead -->

    <div class="team">
        <div class="container">
            <div class="row">
                @foreach($courses as $c)
                <div class="col-md-4">
                    <a href ="{{ url('course-view/'.$c->id) }}" >
                        <div class="pricing-container popular team-container " data-title="หลักสูตรใหม่">
                            <div class="team-photo">
                                <img src="{{ asset('upload/img/'.$c->course_pic) }}" alt="{{ $c->course_name }}" style="height:197px;">
                            </div><!-- .team-photo -->
                            <div class="team-title">
                                <h4>{{ $c->course_name }}</h4>
                                <small>{{ $c->faculty->faculty_name }}</small>


                            </div><!-- .team-title -->
                            <div class="team-info" style="height:50px;">



                            </div><!-- .team-info -->
                            <hr/>
                            <div class="team-footer">
                                <small>begin: {{ $c->course_start }}   To: {{ $c->course_end }}  </small>
                            </div>

                        </div><!-- .team-container -->
                    </a>
                </div><!-- .col-sm-4 -->
                @endforeach


            </div><!-- .row -->

        </div><!-- .container -->
    </div><!-- .team -->
@endsection
