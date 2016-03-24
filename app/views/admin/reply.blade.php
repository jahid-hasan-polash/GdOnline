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
                    {{ Form::open(array('route' => ['admin.doReply',$gd_id], 'method'=>'put','class' => 'form-horizontal')) }}

                    <div class="form-group">
                        {{ Form::label('reply', 'Reply*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::textarea('reply', '' , array('class' => 'form-control', 'placeholder' => 'GD reply')) }}
                        </div>
                    </div>

                    {{-- If Admin is of level 3 --}}
                    @if(Auth::user()->id == 4)
                    <div class="form-group">
                        {{ Form::label('officer_id', 'Assigned Officer*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('officer_id', $officers, null, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Reply', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop