@extends('layouts.app')

@section('title', '| Edit Branch')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Branch: {{ $branch->name }}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($branch, ['route'=>['branch.update', $branch->id], 'method'=>'PUT']) !!}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter Name', 'value'=>old('name')]) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('faculty_id') ? ' has-error' : '' }}">
                            {{ Form::label('faculty_id', 'University', ['class'=>'form-label']) }}
                            <select class="form-control input-lg" name="faculty_id" id="faculty_id" required>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}" {{ ($faculty->id == $branch->faculty_id) ? 'selected' : '' }}>{{ $faculty->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('faculty_id'))
                                <span class="help-block">
                        <strong>{{ $errors->first('faculty_id') }}</strong>
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
