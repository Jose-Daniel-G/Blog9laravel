@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Lista de Cursos</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"><strong>{{ session('info') }}</strong></div>
    @endif
    <!-- Mostrar errores si existen -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" data-toggle="modal" data-target="#createCursoModal">Agregar Curso</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Horas Requeridas</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->id }}</td>
                            <td>{{ $curso->nombre }}</td>
                            <td>{{ $curso->horas_requeridas }}</td>
                            <td width="10px">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-{{ $curso->id }}">Editar</button>
                            </td>

                            <td width="10px">
                                <form action="{{ route('admin.cursos.destroy', $curso) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @include('admin.cursos.edit')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modales para crear y editar vehículos -->
    @include('admin.cursos.create')

@endsection
