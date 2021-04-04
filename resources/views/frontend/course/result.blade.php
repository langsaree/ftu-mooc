@extends('layouts.said-quiz')

@section('content')

    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Result</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Quiz</th>
                            <th>Date</th>
                            <th>Score</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>0/10</td>
                        </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>




@stop
