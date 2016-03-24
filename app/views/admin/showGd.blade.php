@extends('layouts.adminDefault')
    @section('content')
        @include('includes.alert')
        <h2>Hello!! You are level {{Auth::user()->id-1 }} admin.</h2>
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
                                <tr class="text-center">
                                    <td >{{ $gd->gd->id }}</td>
                                    <td >{{ $gd->gd->topic}}</td>
                                    <td >{{ $gd->gd->created_at}}</td>
                                    <td ><a href="{{URL::route('admin.gd.profile', $gd->Gd_id)}}" class="btn btn-primary">See More</a></td>
                                    <td ><a href="{{URL::route('admin.reply', $gd->Gd_id)}}" class="btn btn-danger">Reply</a></td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
@stop