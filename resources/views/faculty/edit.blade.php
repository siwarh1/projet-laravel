@extends('layouts.app')

@section('title', '| Edit Faculty')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Faculty: {{ $faculty->name }}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($faculty, ['route'=>['faculty.update', $faculty->id], 'method'=>'PUT']) !!}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter Name', 'value'=>old('name')]) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('university_id') ? ' has-error' : '' }}">
                            {{ Form::label('university_id', 'University', ['class'=>'form-label']) }}
                            <select class="form-control input-lg" name="university_id" id="university_id" required>
                                @foreach($universities as $univ)
                                    <option value="{{ $univ->id }}" {{ ($univ->id == $faculty->university_id) ? 'selected' : '' }}>{{ $univ->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('university_id'))
                                <span class="help-block">
                        <strong>{{ $errors->first('university_id') }}</strong>
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