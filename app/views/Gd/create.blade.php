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
                    {{ Form::open(array('route' => 'gd.create','method'=>'post','class' => 'form-horizontal')) }}

                    <div class="form-group">
                        {{ Form::label('topic', 'Subject*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('topic', '' , array('class' => 'form-control', 'placeholder' => 'Subject')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('occured-at', 'Occured-at*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('occured-at', '' , array('class' => 'form-control', 'placeholder' => 'date-month-year')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('description', 'Detail*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('description', '' , array('class' => 'form-control', 'placeholder' => 'GD detail')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('requirement', 'Requirement*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('requirement', '' , array('class' => 'form-control', 'placeholder' => 'Any special requirement')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create GD', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop