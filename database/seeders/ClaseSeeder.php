<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clase;
use App\Models\User;
use App\Models\Vehiculo;
use App\Models\Curso;
use Carbon\Carbon;
use Exception; // Add this line to import Exception
class ClaseSeeder extends Seeder
{
    public function run()
    {
        // Obtener los ID de los alumnos, profesores, vehículos y cursos
        $alumnos = User::whereHas('roles', function($q) {
            $q->where('name', 'Alumno');
        })->pluck('id')->toArray();

        $profesores = User::whereHas('roles', function($q) {
            $q->where('name', 'Profesor');
        })->pluck('id')->toArray();

        $vehiculos = Vehiculo::pluck('id')->toArray();
        $cursos = Curso::pluck('id')->toArray();

        // Verificar que los arrays no estén vacíos
        if (empty($alumnos) || empty($profesores) || empty($cursos)) {
            throw new Exception('No se encontraron suficientes alumnos, profesores o cursos para generar las clases.');
        }

        // Crear 10 clases de ejemplo
        for ($i = 1; $i <= 2; $i++) {
            Clase::create([
                'alumno_id' => $alumnos[array_rand($alumnos)],
                'profesor_id' => $profesores[array_rand($profesores)],
                'vehiculo_id' => !empty($vehiculos) ? $vehiculos[array_rand($vehiculos)] : null, // Vehículo puede ser null
                'curso_id' => $cursos[array_rand($cursos)],
                'fecha_hora' => Carbon::now()->addDays(rand(0, 30))->format('Y-m-d H:i:s'),
                'duracion' => rand(60, 120), // Duración entre 60 y 120 minutos
                'estado' => 'programada'
            ]);
        }
    }
}
