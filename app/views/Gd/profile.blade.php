@extends('layouts.default')
	@section('content')
			<h1 class="text-center">{{ $police_station }} Police Station</h1>
			<h3>Name: {{ $user->username }}</h3>
			<h3>National Id No: {{ $user->n_id }}</h3>
			<h3>General Diary Submitted at: {{ $gd->created_at }}</h3><br>
			<h4 class="text-center">Subject: {{ $gd->topic }}</h4>
			<p><i><b>Description: </b></i>{{ $gd->description }}</p><br>
			<p><i><b>Requirements: </b></i>{{ $gd->requirement }}</p>
			<br><br><br>
			<p><i><b>Reply From Police station: </b></i>nothing Yet</p>

	@stop