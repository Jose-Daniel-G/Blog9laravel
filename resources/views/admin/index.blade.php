@extends('adminlte::page')

@section('title', 'DeveloTech')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
    <div id="calendar"></div> <!-- Contenedor para el calendario -->
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
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'es',
                    initialView: 'dayGridMonth'  // Vista inicial
                });
                calendar.render();
            } else {
                console.error('El elemento #calendar no fue encontrado en el DOM');
            }
        });
    </script>
@stop
