
@extends('layouts.app')
@section('title', '| Universities')

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Universities List</div>
            <div class="panel-body">
                @if(count($universities))

                    <table id="dataTable" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($universities as $university)

                            <tr>
                                <td>{{ $university->id }}</td>
                                <td>{{ $university->name }}</td>
                                <td>{{ substr($university->description, 0, 50) }}...</td>
                                <td>
                                    <div style="float: right">

                                        {!! Form::open(['route'=>['university.destroy', $university->id], 'method'=>'DELETE']) !!}
                                        <button name="submit" type="submit" data-toggle="tooltip" title="Delete"
                                                class="btn btn-sm btn-danger"><span class="fa fa-times"></span></button>
                                        {!! Form::close() !!}
                                    </div>
                                    <a href="{{ route("university.edit", $university->id) }}"
                                       class="btn btn-sm btn-info pull-right" style="margin-right: 5px"><span
                                                class="fa fa-pencil"></span></a>


                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="alert alert-warning text-center">There are no universities.</p>
                @endif
            </div>
        </div>
    </div>




    <p>&nbsp;</p>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Add University</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        {!! Form::open(array('route' => 'university.store', 'class'=>'data-form')) !!}
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