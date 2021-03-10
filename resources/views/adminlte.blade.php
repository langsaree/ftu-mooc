@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="sweetalert2.min.css">

@stop
@include('sweetalert::alert')

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ asset('pg/superflat/vendors/bootstrap-growl/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('pg/superflat/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js') }}"></script>




@stop
