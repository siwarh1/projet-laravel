@extends('layouts.app')

@section('title', '| Edit University')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Edit University: {{ $university->name }}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($university, ['route'=>['university.update', $university->id], 'method'=>'PUT']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter Name', 'value'=>old('name')]) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control input-lg', 'placeholder'=>'Description']) !!}

                            @if ($errors->has('description'))
                                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="text-right">
                            {!! Form::submit('Save', ['class'=>'btn btn-warning btn-block btn-lg']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
