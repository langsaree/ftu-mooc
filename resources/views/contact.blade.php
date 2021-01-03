@extends('layouts.frontend')
@section('content')
    <div class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title">
                        <h2>Contact us</h2>
                        <small></small>
                    </div><!-- .page-title -->
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-header -->


    <!-- post-entry -->
    <div class="post-entry">
        <div class="container">
            <div class="row">

                <!-- contact-form -->
                <div class="col-md-12">

                    <form class="pretty-form" id="contactForm"  action="" method="post">
                        <p></p>

                        <p></p>
                        <hr/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ชื่อ:" required="required">
                                </div>
                            </div><!-- .col-md-6 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="อีเมลล์:" required="required">
                                </div>
                            </div><!-- .col-md-6 -->
                        </div><!-- .row -->
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="หัวข้อ:">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="ข้อความ: "></textarea>
                        </div>
                        <input type="submit" id="contact_submit" class="btn btn-secondary btn-lg btn-block btn-rounded btn-bordered" value="Submit">
                    </form>

                </div><!-- .col-md-6 -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .post-entry -->
@stop
