@extends('layouts.app')

@section('title', '| Faculties')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Faculties List</div>
            <div class="panel-body">

                @if(count($faculties))
                    <table id="dataTable" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>University</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($faculties as $faculty)

                            <tr>
                                <td>{{ $faculty->id }}</td>
                                <td>{{ $faculty->name }}</td>
                                <td>{{ $faculty->university->name }}</td>
                                <td>
                                    <div style="float: right">

                                        {!! Form::open(['route'=>['faculty.destroy', $faculty->id], 'method'=>'DELETE']) !!}
                                        <button name="submit" type="submit" data-toggle="tooltip" title="Delete"
                                                class="btn btn-sm btn-danger"><span class="fa fa-times"></span></button>
                                        {!! Form::close() !!}
                                    </div>
                                    <a href="{{ route("faculty.edit", $faculty->id) }}"
                                       class="btn btn-sm btn-info pull-right" style="margin-right: 5px"><span
                                                class="fa fa-pencil"></span></a>


                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="alert alert-warning text-center">There are no faculties.</p>
                @endif
            </div>
        </div>
    </div>



    <p>&nbsp;</p>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add Faculty</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::open(array('route' => 'faculty.store', 'class'=>'data-form')) !!}
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
                                    <option value="{{ $univ->id }}">{{ $univ->name }}</option>
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
                }]
            });
        });
    </script>
@endsection