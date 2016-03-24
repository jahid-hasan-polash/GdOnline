@extends('layouts.adminDefault')
    @section('content')
        @include('includes.alert')
        <h2>Hello!! Super admin.</h2>
        <h3>You have the following GDs' to review:</h3> 
         <div class="panel-body">
                    @if(count($gds))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th class="text-center">GD ID</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Occured At</th>
                                <th class="text-center">See More</th>     
                            </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($gds as $gd)
                                <tr class="text-center">
                                    <td >{{ $gd->id }}</td>
                                    <td >{{ $gd->topic}}</td>
                                    <td >{{ $gd->created_at}}</td>
                                    <td ><a href="{{URL::route('gd.profile', $gd->id)}}" class="btn btn-primary">See More</a></td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
@stop