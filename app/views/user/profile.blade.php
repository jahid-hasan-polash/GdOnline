@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <!--<section class="panel">
          <header class="panel-heading">
          <section hidden>{{ $data=Auth::user() }}</section>
            <h1>Hello , {{ $data['username'] }} 

             </h1>
             <span class="pull-right">
                  <a href="{{ URL::route('user.edit')}}" class="btn btn-success btn-sm btn-new-user">Edit Profile</a>
             </span>

          </header>
           <div class="panel_body">
                <h3>Your National ID No: {{ $data['n_id'] }}</h3>
                <h3>Your Address : {{ $data['address'] }}</h3>
                <h3>Your Phone Number : {{ $data['phone'] }}</h3>
                <h3>Your Email address : {{ $data['email'] }}</h3>

           </div>
        </section>-->
         
        
        <h1>Hello, {{ $data['username'] }} </h1>
                <h3>Your National ID No: {{ $data['n_id'] }}</h3>
                <h3>Your Address : {{ $data['address'] }}</h3>
                <h3>Your Phone Number : {{ $data['phone'] }}</h3>
                <h3>Your Email address : {{ $data['email'] }}</h3>
        <a href="{{ URL::route('user.edit')}}" class="btn btn-success btn-sm btn-new-user">Edit Profile</a>
@stop