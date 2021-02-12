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
                    <p>Enter Exam title :</p>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>

                    <div class="input-group mb-3"> </div>

                    <p>Enter total number of questions :</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"></span>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                        </select>
                    </div>

                    <div class="input-group mb-3"> </div>

                    <p>Enter marks on right answer :</p>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>

                    <div class="input-group mb-3"></div>

                    <p>Enter minus marks on wrong answer :</p>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group mb-3"></div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{url('Choices')}}" class="btn  btn-icon-text btn-success"><i class="zmdi zmdi-apps"></i>Submit</a>
                        </ol>
                    </div>
                </div>

            </div>

        </div>


    </section>

@stop

