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
                                <!-- Botón de edición con los datos del vehículo -->
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCursoModal"
                                    data-id="{{ $curso->id }}" 
                                    data-name="{{ $curso->nombre }}" 
                                    data-horas_requeridas="{{ $curso->horas_requeridas }}"
                                    data-placa="{{ $curso->placa }}"
                                    data-tipo="{{ $curso->tipo }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.cursos.destroy', $curso) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modales para crear y editar vehículos -->
    @include('admin.cursos.create')
    @include('admin.cursos.edit')

@endsection

    @section('js')
    <script>
        $(document).ready(function() {
            // Llenar el modal de edición con los datos del vehículo seleccionado
            $('#editCursoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Botón que disparó el modal
                var id = button.data('id'); // Extraer el ID del vehículo
                var name = button.data('name'); // Extraer el nombre del vehículo
                var horas_requeridas = button.data('horas_requeridas'); // Extraer el horas_requeridas del vehículo
                var IdCurso = button.data('IdCurso'); // Extraer la IdCurso del vehículo
                var tipo = button.data('tipo'); // Extraer el tipo de vehículo

                // Actualizar la acción del formulario con el ID del vehículo
                var form = $('#editCursoForm');
                var action = form.attr('action').replace(':id', id);
                form.attr('action', action);

                // Rellenar los campos del modal con los datos del vehículo
                $('#editCursoNombre').val(name);
                $('#editCursoModelo').val(horas_requeridas);
                $('#editCursoTipo').val(tipo);

                // Mostrar la IdCurso en el campo de texto y actualizar el campo oculto
                $('#editCursoID').val(IdCurso); // Mostrar la IdCurso al usuario
                $('#IdCurso').val(IdCurso); // Asegurarse de que el valor de la IdCurso se envía
            });
        });
    </script>

@endsection
