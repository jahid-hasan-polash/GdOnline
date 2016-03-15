@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                </header>
                <div class="panel-body">
                    {{ Form::model($user , array('route' => 'user.update' ,'method'=>'put','class' => 'form-horizontal')) }}
                    <!--National ID -->
                    <div class="form-group">
                        {{ Form::label('n_id', 'National Id No', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::number('n_id', $user->n_id, array('class' => 'form-control', 'placeholder' => 'National Id Number')) }}
                        </div>
                    </div>
                    <!--Name -->
                    <div class="form-group">
                        {{ Form::label('username', 'Name', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('username', $user->username, array('class' => 'form-control', 'placeholder' => 'Username')) }}
                        </div>
                    </div>
                    <!--Address -->
                    <div class="form-group">
                        {{ Form::label('address', 'Address', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('address', $user->address, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                        </div>
                    </div>
                    <!--Phone Number -->
                    <div class="form-group">
                        {{ Form::label('phone', 'Phone Number', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('phone', $user->phone , array('class' => 'form-control', 'placeholder' => 'Phone Number')) }}
                        </div>
                    </div>
                    <!--Email-->
                    <div class="form-group">
                        {{ Form::label('email', 'Email', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::email('email', $user->email , array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop