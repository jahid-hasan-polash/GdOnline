@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="text-center">Hello!!</h1>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                    <h4 class="text-center"><i><b>User Info :</b></i></h4>
                    <h4 class="text-center">Name: {{ $user->username }}</h4>
                    <h4 class="text-center">National Id No: {{ $user->n_id }}</h4>
                    <h4 class="text-center">Address: {{ $user->address }}</h4>
                    <h4 class="text-center">Email Address: {{ $user->email }}</h4>
                    <h4 class="text-center">Contact No: {{ $user->phone }}</h4>
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop
