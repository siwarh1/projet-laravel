@extends('layouts.app')
@section('title', '| Edit Student')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Student: {{ $student->firstname }} {{ $student->lastname }}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::model($student, ['route'=>['student.update', $student->id], 'method'=>'PUT']) !!}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            {!! Form::label('firstname', 'FirstName') !!}
                            {!! Form::text('firstname', null, ['class'=>'form-control input-lg', 'placeholder'=>'First Name', 'value'=>old('firstname')]) !!}

                            @if ($errors->has('firstname'))
                                <span class="help-block">
                        <strong>{{ $errors->first('firstname') }}</strong>
                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            {!! Form::label('lastname', 'LastName') !!}
                            {!! Form::text('lastname', null, ['class'=>'form-control input-lg', 'placeholder'=>'LastName', 'value'=>old('lastname')]) !!}

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            {!! Form::label('birthday', 'Birthday') !!}
                            {!! Form::text('birthday', null, ['class'=>'form-control input-lg', 'value'=>old('birthday'), 'id'=>'datepicker']) !!}

                            @if ($errors->has('birthday'))
                                <span class="help-block">
                        <strong>{{ $errors->first('birthday') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                            {{ Form::label('branch_id', 'Branch', ['class'=>'form-label']) }}
                            <select class="form-control input-lg" name="branch_id" id="branch_id" required>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ ($branch->id == $student->branch_id) ? 'selected' : '' }}>{{ $branch->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('branch_id'))
                                <span class="help-block">
                        <strong>{{ $errors->first('branch_id') }}</strong>
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

@endsection