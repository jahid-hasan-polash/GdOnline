@extends('layouts.adminDefault')
    @section('content')
        @include('includes.alert')
        <h2>Hello!! You are level {{$role}} admin.</h2>
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
                                <th class="text-center">Reply</th>         
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($gds as $gd)
                                @if($role == 1)
                                    @if($gd->thana_id == $officer_ps_id)
                                    <tr class="text-center">
                                        <td >{{ $gd->id }}</td>
                                        <td >{{ $gd->topic}}</td>
                                        <td >{{ $gd->created_at}}</td>
                                        <td ><a href="{{URL::route('admin.gd.profile', $gd->id)}}" class="btn btn-primary">See More</a></td>
                                        <td ><a href="{{URL::route('admin.reply', $gd->id)}}" class="btn btn-danger">Reply</a></td>
                                    </tr>
                                    @endif
                                @else
                                    <tr class="text-center">
                                        <td >{{ $gd->id }}</td>
                                        <td >{{ $gd->topic}}</td>
                                        <td >{{ $gd->created_at}}</td>
                                        <td ><a href="{{URL::route('admin.gd.profile', $gd->id)}}" class="btn btn-primary">See More</a></td>
                                        @if($role != 4)
                                        <td ><a href="{{URL::route('admin.reply', $gd->id)}}" class="btn btn-danger">Reply</a></td>
                                        @else 
                                        <td ><a href="{{URL::route('superAdmin.depricate', $gd->id)}}" class="btn btn-danger">Depricate</a></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
@stop