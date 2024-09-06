@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
<h1>Lista de Vehiculo</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
@endif

<div class="card">
    <div class="card-header"><a href="" class="btn btn-secondary">Agregar Vehiculo</a></div>
    <div class="card-body">

    </div>
</div>
@stop
