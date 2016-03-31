@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="text-center">{{$title}}</h1>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                    <h4 class="text-center">Name: {{ $officer->name }}</h4>
                    <h4 class="text-center">Email: {{ $officer->email }} </h4>
                    <h4 class="text-center">Contact No: {{ $officer->phone_number }} </h4>
                    <h4 class="text-center">Police Station: {{ $ps_name }} Thana</h4>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
