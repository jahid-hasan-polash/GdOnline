@extends('layouts.AdminDefault')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'officer.store','method'=>'post','class' => 'form-horizontal')) }}

                    <div class="form-group">
                        {{ Form::label('ps_id', 'Associated Police station*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('ps_id', $ps, null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('name', 'Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', '' , array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('email', 'Email*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::email('email', '' , array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('phone', 'Phone Number*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('phone', '' , array('class' => 'form-control', 'placeholder' => 'contact number')) }}
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
