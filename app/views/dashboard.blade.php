@extends('layouts.default')
    @section('content')

        @include('includes.alert')
        <h1>Hi, <?php
                            $email  = Auth::user()->email;
                            $user = strstr($email, '@', true); // As of PHP 5.3.0
                            echo $user; // prints name
                          ?>  
         </h1>
         
         <h3>You have the following GDs':</h3>

         <div class="panel-body">
                    @if(count($gds))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th class="text-center">GD ID</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Occured At</th>
                                <th class="text-center">See More</th>
                                <th class="text-center">Edit</th>         
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gds as $gd)
                                <tr class="text-center">
                                    <td >{{ $gd->id }}</td>
                                    <td >{{ $gd->topic}}</td>
                                    <td >{{ $gd->created_at}}</td>
                                    <td ><a href="{{URL::route('gd.profile', $gd->id)}}" class="btn btn-primary">See More</a></td>
                                    <td ><a href="{{URL::route('gd.edit', $gd->id)}}" class="btn btn-danger">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
         
    @stop