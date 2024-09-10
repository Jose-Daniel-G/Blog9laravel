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
        // $request->validate(['title' => 'required','descripcion' => 'required','start' => 'required|date','end' => 'required|date',]);
        Evento::create($request->all());
    
        return response()->json(['message' => 'Evento creado correctamente']);
    }
    public function show(Evento $evento)
    {
        $evento = Evento::all();
        return response()->json($evento);
    }
    public function edit($id)
    {
        $evento = Evento::find($id);
        // dd($evento);
        return response()->json($evento);
        //return view("admin.eventos.edit", compact("evento"));
        // return response()->json(compact("evento"));
    }
    public function update(Request $request, Request $evento)
    {
        //
    }
    public function destroy(Request $evento)
    {
        //
    }
}
