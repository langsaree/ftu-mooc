@extends('layouts.said-quiz')

@section('content')



    <div class="card-header w-100">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark"><i class="far fa-star color-success"></i> Answer all this Question  </h6>
            </div>

            <div class="card-body">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5"><b>Q1. which option best describes your job role?</b></div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Second default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                            <label class="form-check-label" for="exampleRadios3">
                                Disabled radio
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5"><b>Q2. which option best describes your job role?</b></div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Second default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                            <label class="form-check-label" for="exampleRadios3">
                                Disabled radio
                            </label>
                        </div>
                    </div>
                </div><button type="button" class="btn btn-success btn-lg float-right">Submit</button>
            </div>


        </div>
    </div>








@endsection
