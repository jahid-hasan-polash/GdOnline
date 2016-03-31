@extends('layouts.adminDefault')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="text-center">{{ $police_station }} Police Station</h1>
                </header>
                <div class="panel-body">
                    <div class="form-group">
                    <h4><i><b>User Info :</b></i></h4>
                    <h4>Name: {{ $user->username }}</h4>
                    <h4>National Id No: {{ $user->n_id }}</h4>
                    <h4>Address: {{ $user->address }}</h4>
                    <h4>Email Address: {{ $user->email }}</h4>
                    <h4>Contact No: {{ $user->phone }}</h4>
                    <h4>General Diary Submitted at: {{ $gd->created_at }}</h4><br>
                    </div>

                    <div class="form-group">
                    <h4><i><b>GD Info :</b></i></h4>
                    <h4>Subject: {{ $gd->topic }}</h4>
                    <h4>Occurance Date: {{ $gd->occured_at }}</h4>
                    <h4>Occurance Place: {{ $gd->occurance_place }}</h4>
                    <h5><i><b>Description: </b></i></h5>
                    <p>{{ $gd->description }}</p><br>
                    <h5><i><b>Requirements: </b></i></h5>
                    <p>{{ $gd->requirement }}</p><br>
                    </div>

                    <div class="form-group">
                    <h4><i><b>Aditional Info :</b></i></h4>
                    <h4>Officer Assigned: {{ $officer }}</h4>
                    <h4><i>Reply From Police Station:</i></h4>

	                    @if(count($replys))
	                    	@foreach($replys as $reply)
	                    		@if($reply->admin_level==0)
	                    			Yet Not varified
	                    		@else
	                    		<h5>Admin level: {{ $reply->admin_level }} </h5>
	                    		<p>{{ $reply->reply }}</p><br>
	                    		@endif
	                    	@endforeach
	                    @endif

                    </div>
                </div>
            </section>
        </div>
    </div>
@stop