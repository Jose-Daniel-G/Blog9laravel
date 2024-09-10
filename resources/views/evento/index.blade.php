@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
    <div class="card-header">
        <a class="btn btn-secondary" data-toggle="modal" data-target="#claseModal">Agregar Curso</a>
    </div>
    <div id="calendar"></div> <!-- Contenedor para el calendario -->
    {{-- @include('evento.modal.modal') --}}
    {{-- MODAL --}}
    <div class="modal fade" id="claseModal" tabindex="-1" aria-labelledby="claseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="claseModalLabel">Crear nuevo Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control" name="id" id="id"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="title">Clase</label>
                            <input type="text" class="form-control" name="title" id="title"
                                aria-describedby="helpId" placeholder="Agenda la clase">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion del evento</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Start</label>
                            <input type="date" class="form-control" name="dateStart" id="dateStart"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="dateEnd">End</label>
                            <input type="date" class="form-control" name="dateEnd" id="dateEnd"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success me-2" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning me-2" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger me-2" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-secondary me-2" data-dismiss="modal">cerrar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    {{-- FullCalendar CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
@stop

@section('js')
    {{-- FullCalendar JS --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    {{-- Script para inicializar el calendario --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let formulario = document.querySelector("form");
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'es',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth, timeGridWeek,listWeek' // Vista inicial 
                    },
                    dateClick: function(info) {
                        $("#claseModal").modal("show");
                    }
                });
                calendar.render();
                document.getElementById("btnGuardar").addEventListener("click", function() {
                    const datos = new FormData(formulario);
                    console.log(formulario.title.value);
                    axios.post("http://laravel9.test/evento/agregar", $datos)
                        .then((respuesta) => {
                            $("#claseModal").modal("hide");
                        })
                })
            } else {
                console.error('El elemento #calendar no fue encontrado en el DOM');
            }
        });
    </script>
    {{-- Script para inicializar el calendario --}}
    {{-- <script scr="{{ mix('js/calendar.js') }}"></script> --}}
@stop
