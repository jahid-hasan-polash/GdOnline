@extends('layouts.adminDefault')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                </header>
                <div class="panel-body">
                    {{ Form::open( array('route' => 'admin.store', 'method'=>'post','class' => 'form-horizontal')) }}


                    <div class="form-group">
                        {{ Form::label('role', 'Admin Type*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('role', $admin_roles , null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>

                    <h3>General Information</h3>

                    <div class="form-group">
                        {{ Form::label('n_id', 'National Id No*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('n_id', null , array('class' => 'form-control', 'placeholder' => 'National Id No')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('username', 'Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('username', null , array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address', 'Address*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address', null , array('class' => 'form-control', 'placeholder' => 'Address')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('phone', 'Phone Number*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('phone', null , array('class' => 'form-control', 'placeholder' => 'Phone Number')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::email('email', null , array('class' => 'form-control', 'placeholder' => 'email address')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                        </div>
                    </div>

                    <h3>For Admin 1</h3>

                    <div class="form-group">
                        {{ Form::label('ps_id', 'Associated Police station*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('ps_id', $ps, null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>

                    <h3>For Admin 2</h3>

                    <div class="form-group">
                        {{ Form::label('short_range', 'Range*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('short_range', $short_range, null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>

                    <h3>For Admin 3</h3>

                    <div class="form-group">
                        {{ Form::label('long_range', 'Range*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('long_range', $long_range, null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop
