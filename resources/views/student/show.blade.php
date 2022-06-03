@extends('layouts.app')

@section('title', '| show Student')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2> Fiche etudiant</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-outline-primary" href="{{ route('student'.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numéro:</strong>
                {{ $student->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>first name</strong>
                {{ $student->firstname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last name:</strong>
                {{ $student->lastname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>num branche:</strong>
                {{ $student->branch_id }}
            </div>
        </div>
    </div>
@endsection