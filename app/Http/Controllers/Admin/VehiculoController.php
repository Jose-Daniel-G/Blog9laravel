<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        return view('admin.vehiculos.index');
    }

    public function create()
    {
        return view('admin.vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'marca' => 'required|string|max:255','anio' => 'required|integer','color' => 'required|string|max:50',
            'placa' => 'required|string|max:10',
            'modelo' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
        ]);
    
        Vehiculo::create($request->all());
    
        return redirect()->route('admin.vehiculos.index')->with('success', 'Vehículo creado correctamente.');
    }

    public function show(Vehiculo $vehiculo)
    {
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('admin.vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            // 'marca' => 'required|string|max:255','anio' => 'required|integer','color' => 'required|string|max:50',
            'placa' => 'required|string|max:10','modelo' => 'required|string|max:255','tipo' => 'required|string|max:50',
        ]);
    
        $vehiculo->update($request->all());
    
        return redirect()->route('admin.vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }
    public function destroy(Vehiculo $vehiculo)
    {
        $this->authorize('author',$vehiculo);
        $vehiculo->delete();
        return redirect()->route('admin.posts.index')->with('success','El post ha sido eliminado exitosamente');
    }
}
