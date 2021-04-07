@extends('adminlte::page')

@section('content')

    <section id="content">
        <div class="container">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Question Details</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Question number 1 :</p>
                    <div class="col-md-12">
                        <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control"
                                  placeholder="Write question number 1"></textarea>
                    </div>
                    <div class="input-group mb-3"> </div>
                    <div class="col-md-12">
                        <input id="'.$i.'1" name="'.$i.'1"
                               placeholder="Enter option a" class="form-control input-md" type="text">
                    </div>
                    <div class="input-group mb-3"> </div>
                    <div class="col-md-12">
                        <input id="'.$i.'1" name="'.$i.'1"
                               placeholder="Enter option b"
                               class="form-control input-md" type="text">
                    </div>
                    <div class="input-group mb-3"> </div>
                    <div class="col-md-12">
                        <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option c" class="form-control input-md" type="text">
                    </div>
                    <div class="input-group mb-3"> </div>
                    <div class="col-md-12">
                        <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option d" class="form-control input-md" type="text">
                    </div>
                    <div class="input-group mb-3"> </div>
                    <p>Correct answer :</p>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="1">a</option>
                            <option value="1">b</option>
                            <option value="2">c</option>
                            <option value="3">d</option>
                        </select>
                    </div>
                    <div class="input-group mb-3"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="#" class="btn  btn-icon-text btn-success">
                                <i class="zmdi zmdi-apps"></i>Submit</a>
                        </ol>
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{url('AddPretest')}}" class="btn  btn-icon-text btn-info"><i class="long-arrow-alt-left"></i>Back</a>

                        </ol>

                    </div>


                </div>

            </div>

        </div>


    </section>

@stop

