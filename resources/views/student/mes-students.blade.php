@extends('layouts.app')

@section('title', '| Students')

@section('content')
@if(Auth::user()->id !=null)
    <a type="button" href="{{route('student.create')}}" class="btn btn-primary">Ajouter</a>
@endif


    @include('layouts.liste-student')
