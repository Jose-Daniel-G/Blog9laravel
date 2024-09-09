<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    public function run()
    {
        $tipos = ['automovil','motocicleta','camioneta'];
        for ($i = 1; $i <= 20; $i++) {
            Vehiculo::create([
                'placa' => 'ABC-' . str_pad($i, 3, '0', STR_PAD_LEFT), // Placa de vehículo
                'nombre' => 'Vehiculo ' . $i, // Nombre del vehículo
                'modelo' =>  (2000 + $i), // Modelo del vehículo
                'tipo' => $tipos[array_rand($tipos)], // Selecciona un tipo aleatorio
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}