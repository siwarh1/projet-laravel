@extends('layouts.app')

@section('title', '| Students')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Students List</div>
            <div class="panel-body">
                @if(count($students))

                    <table id="dataTable" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Birthday</th>
                            <th>Branch</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($students as $student)

                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>{{ $student->birthday }}</td>
                                <td>{{ $student->branch->name }}</td>
                                <td>
                                    <div style="float: right">

                                        {!! Form::open(['route'=>['student.destroy', $student->id], 'method'=>'DELETE']) !!}
                                        <button name="submit" type="submit" data-toggle="tooltip" title="Delete"
                                                class="btn btn-sm btn-danger"><span class="fa fa-times"></span></button>
                                        {!! Form::close() !!}
                                    </div>
                                    <a href="{{ route("student.edit", $student->id) }}"
                                       class="btn btn-sm btn-info pull-right" style="margin-right: 5px"><span
                                                class="fa fa-pencil"></span></a>


                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="alert alert-warning text-center">There are no students.</p>
                @endif

            </div>
        </div>
    </div>


    <p>&nbsp;</p>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add Student</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::open(array('route' => 'student.store', 'class'=>'data-form')) !!}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            {!! Form::label('firstname', 'FirstName') !!}
                            {!! Form::text('firstname', null, ['class'=>'form-control input-lg', 'placeholder'=>'FirstName', 'value'=>old('firstname')]) !!}

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
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
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

@stop


@section("stylesheets")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section("scripts")
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                columnDefs: [{
                    targets: [0],
                    orderData: [0, 1]
                }, {
                    targets: [1],
                    orderData: [1, 0]
                }, {
                    targets: [2],
                    orderData: [2, 0]
                }, {
                    targets: [3],
                    orderData: [3, 0]
                }]
            });
        });
    </script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>

@endsection