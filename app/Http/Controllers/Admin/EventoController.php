<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('eventos.index');
    }
    public function create()
    {
        //
    }
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'start' => 'required|date',
        'end' => 'required|date',
    ]);

    Evento::create($request->all());

    return response()->json(['message' => 'Evento creado correctamente']);
}
    public function show(Evento $evento)
    {
        //
    }
    public function edit(Evento $evento)
    {
        //
    }
    public function update(Request $request, Evento $evento)
    {
        //
    }
    public function destroy(Evento $evento)
    {
        //
    }
}
