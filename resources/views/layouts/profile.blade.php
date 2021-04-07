<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ME</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e3b0f576bf.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

    <!------ Include the above in your HEAD tag ---------->
</head>

<style>
    body{
        background: -webkit-linear-gradient(left, #dfe4ea ,#dfe4ea);
    }
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #009432;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #009432;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #009432;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #009432;
    }
    .move-me{
        position: absolute;
        top: 80px;
        right: 10px;
        width: 30%;
        height: 70%;
    }
    .move-me1{
        position: absolute;
        top: 10px;
        right: 20px;
        width: 70%;
        height: 50%;
    }

</style>



<body>

<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <a class="text-white text-2" href="{{url('/')}}"><i class="fas fa-home"></i> Home</a>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>
</div>

<div class="container emp-profile">
    <form method="post">

        <div class="row center-block">
            <div class="card ">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class=" move-me1"
                             {{--src="{{ Auth::User()->avatar }}"--}}
                             src="{{ asset('svg/man1.svg') }}"
                             alt="User profile picture">
                    </div>
                    <a href="javascript:void(0)" onclick="UploadPic()" class="pmop-edit">
                        <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Update pictures</span>
                    </a>
                    <div class="modal fade" id="UploadPic" tabindex="-1" role="dialog" aria-hidden="true"
                         style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ url('InstructorUploadPic/'.Auth::User()->avatar) }}" method="post" id="upload_file"
                                      name="upload_file" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <div class="modal-header">
                                        <h4 class="modal-title">image</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <div class="thumbnail">
                                                    <img class="img-responsive"
                                                         src="" alt="">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-l-10">

                                        </div>
                                        <div class="row m-l-10">
                                            <br/>
                                            <input type="hidden" name="id_s" id="id_s" value="{{--{{ $course->id }}--}}">
                                            <input type="hidden" name="id" id="id" value="{{--{{ $course->id }}--}}">
                                            <input type="hidden" name="id_pic" id="id_code" value="{{--{{ $course->course_pic }}--}}">
                                            <p class=" c-black m-b-20">Picture show</p>

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                                <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new">Select picture</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="pic" id="pic">
                                            </span>
                                                    {{--<a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput">move</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-primary" id="subpic">Save changes</button>
                                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>

            <br>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ Auth::User()->name }}
                    </h5>
                    @if(Auth::user()->role_id == 1)
                    <h6>
                        <i class="fas fa-user-cog"></i> Manager
                    </h6>
                    @elseif(Auth::user()->role_id == 2)
                        <h6>
                            <i class="fas fa-chalkboard-teacher"></i> Lecturer
                        </h6>
                    @elseif(Auth::user()->role_id == 3)
                        <h6>
                            <i class="fas fa-user-graduate"></i> Student
                        </h6>
                    @endif
                   <br>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item text-success nav-link active " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">About ME</a>
                            <a class="nav-item text-success nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My Courses</a>
                            <a class="nav-item text-success nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Certificate</a>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       {{-- @php
                                            $students = DB::table('students')->get();

                                        @endphp
                                        @foreach($students as $St)--}}
                                        <div class="row">
                                            <div class="col-md-6"><label>User Id</label></div>
                                            <div class="col-md-6"><p>602431008</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><label>Name</label></div>
                                            <div class="col-md-6"><p>{{ Auth::User()->name }}</p></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label>Address</label></div>
                                            <div class="col-md-6"> <p>Yala</p>  </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label>Education</label></div>
                                            <div class="col-md-6"> <p>FTU</p>  </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> <label>Email</label></div>
                                            <div class="col-md-6"> <p>{{ Auth::User()->email }}</p>  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


                           @include('student.Mycourse')


                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <img src="{{asset('svg/cer.jpg')}}" alt="..." class="img-thumbnail">
                        </div>
                    </div>



                </div>
            </div>
        </div><img src="{{asset('svg/left.svg')}}" class="move-me" alt="...">
    </form>
</div>

@section('js')

    <script src="{{ asset('pg/superflat/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>

    <script>

        //Upload Pic
        function UploadPic() {
            $("#UploadPic").modal({
                show: true
            });
        }




    </script>


@stop
</body>
</html>

