<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{
            margin-top:20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('profile')}}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('certificate') }}">certificate</a></li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ Auth::User()->avatar }}" alt="..." class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{ Auth::User()->name }}</h4>

                                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                {{--<button type="button" class="btn btn-primary btn-sm">Message</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">

                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">

                        <img src="{{asset('svg/cer.jpg')}}" class="img-fluid" alt="Responsive image">

                    </div>
                </div>

                <div class="row gutters-sm">
                    {{-- <div class="col-sm-6 mb-3">
                         <div class="card h-100">
                             <div class="card-body">
                                 <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-success mr-2">My Courses</i>..</h6>
                                 <small>name of course</small>
                                 <div class="progress mb-3" style="height: 5px">
                                     <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>--}}

                    {{--<div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-warning mr-2">..</i>..</h6>
                                <small>-----</small>
                                <div class="progress mb-3" style="height: 5px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
                {{-- <div class="card mb-3">
                     <div class="card-body">
                         <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">certificate</i>.</h6>
                         <small>...</small>




                     </div>
                 </div>--}}



            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
