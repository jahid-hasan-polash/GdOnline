@extends('layouts.adminDefault')
    @section('content')

        @include('includes.alert')
        
         <h3>The Officer List is here: </h3>

         <div class="panel-body">
                    @if(count($officers))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th class="text-center">Officer Id</th>
                                <th class="text-center">Police Station</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>         
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($officers as $officer)
                                <tr class="text-center">
                                    <td >{{ $officer->id }}</td>
                                    <td >{{ Ps::find($officer->ps_id)->ps_name }}</td>
                                    <td >{{ $officer->name}}</td>
                                    <td >{{ $officer->email}}</td>
                                    <td >{{ $officer->phone_number}}</td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
         
    @stop