@extends('adminlte::page')

@section('content')
    <section id="content">
        <div class="container">

            <!-- Main content -->

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-success card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ asset('upload/img/'.$course->course_pic) }}"
                             alt="User profile picture">

                        <div class="pmo-stat">
                            <h2 class="m-0 c-white">{{ $students->count() }}</h2>
                            Students apply for membership
                        </div>

                    </div>




                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Course details</b>
                        </li>
                        <li><i class="zmdi zmdi-flag zmdi-hc-fw"></i> {{ $course->course_name }}</li>
                        <li><i class="zmdi zmdi-label zmdi-hc-fw"></i> {{ $course->faculty->faculty_name }}</li>
                        <li><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i> {{ $course->course_start }}</li>
                        <li><i class="zmdi zmdi-calendar-close zmdi-hc-fw"></i> {{ $course->course_end }}</li>

                    </ul>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-success">

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active  " href="#Information" data-toggle="tab">General information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Study" data-toggle="tab">Study program</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Learner</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="Information">

                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->

                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-success"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">About the course</a> </h3>


                                            <div class="timeline-body">
                                                {!! $course->course_about !!}
                                            </div>

                                            <div class="timeline-footer">
                                                <a data-pmb-action="edit" href="#" class="btn btn-success btn-sm">modify</a>

                                            </div>

                                            <div class="pmbb-edit">

                                                <div class="fg-line">
                                                    <input type="hidden" id="course_id" value="{{ $course->id }}">
                                                    <textarea class="form-control" name="course_about" id="course_about"
                                                              rows="5" placeholder="About This Course..."
                                                              required="required"> {!! $course->course_about !!} </textarea>
                                                </div>
                                                <div class="m-t-10">
                                                    <button class="btn btn-primary btn-sm" type="submit"
                                                            onclick="UpdateAbout()">record
                                                    </button>
                                                    <button data-pmb-action="reset" class="btn btn-link btn-sm">cancel</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                            <h3 class="timeline-header border-0"><a href="#">Course goals</a>
                                            </h3>

                                            <div class="timeline-body">
                                                {!! $course->course_description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">General </a> information</h3>

                                            <div class="timeline-body">

                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt>Course name</dt>
                                                        <dd>{{ $course->course_name }}
                                                        </dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>language</dt>
                                                        <dd>
                                                            {{ $course->course_languages }}
                                                        </dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Begin</dt>
                                                        <dd>{{ $course->course_start }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>End</dt>
                                                        <dd>{{ $course->course_end }}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>price</dt>
                                                        @if($course->course_price == 0)
                                                            <dd><span class='label label-success'>FREE</span></dd>
                                                        @else
                                                            <dd><span class='label label-success'>{{ $course->course_price }}</span>
                                                            </dd>
                                                        @endif
                                                    </dl>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Group Information</a> </h3>

                                            <div class="timeline-body">

                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt>Category</dt>
                                                        <dd>{{ $course->faculty->faculty_name }}</dd>
                                                    </dl>

                                                    <dl class="dl-horizontal">
                                                        <dt>category</dt>
                                                        <dd>{{ $course->group->group_nameen }}</dd>
                                                    </dl>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->

                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Test</a> .</h3>

                                            <div class="timeline-body">
                                                <div class="pmbb-view">
                                                    <dl class="dl-horizontal">
                                                        <dt>Test before study</dt>

                                                        <dd>
                                                            @if($course->course_pretest == 0)
                                                                <span class='c-red'>There is no test before study</span>
                                                            @else
                                                                <span class='c-green'>There is a test before study</span>
                                                            @endif
                                                        </dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Test after class</dt>

                                                        <dd>
                                                            @if($course->course_posttest == 0)
                                                                <span class='c-red'>No test after study</span>
                                                            @else
                                                                <span class='c-green'>There is a test after study</span>
                                                            @endif
                                                        </dd>

                                                    </dl>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="Study">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <h2 class="text-center">Study program</h2>
                                @include('instructor.curriculum')


                            </div>
                        </div>
                        <!-- /.tab-pane -->




                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name-Surname</th>
                                            <th>email</th>
                                            <th>Percentage</th>
                                            <th>Study status</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @php

                                            $i = 1;

                                        @endphp
                                        @foreach ($students as $stu)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $stu->user->student->student_fullname  }}</td>
                                                <td>{{ $stu->user->email }}</td>
                                                <td></td>
                                                <td><span class="badge bg-success">Under study</span>
                                                </td>

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

@stop
