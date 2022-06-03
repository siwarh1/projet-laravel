@extends('layouts.app')

@section('title', '| create Student')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter un nouveau etudiant</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('student.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oups! </strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('student.store') }}" method="POST">
    @csrf
  
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>first name:</strong>
                <input type="text" name="firstname" class="form-control" placeholder="Saisir le prenom">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>last name:</strong>
                <input type="text" name="lastname" class="form-control" placeholder="Saisir le nom ">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
        </div>
   
</form>
@endsection

