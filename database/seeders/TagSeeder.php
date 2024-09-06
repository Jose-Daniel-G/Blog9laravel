<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Normas de tráfico',
            'Consejos de conducción',
            'Seguridad vial',
            'Mantenimiento del vehículo',
            'Técnicas de manejo',
            'Exámenes de conducción',
            'Licencias de conducir',
            'Actualización de normativa',
            // 'Señales de tránsito',
            // 'Primeros auxilios',
            // 'Clases prácticas',
            // 'Conducción en carretera',
            // 'Conducción en ciudad',
            // 'Estacionamiento',
            // 'Conducción defensiva',
            // 'Cursos intensivos',
            // 'Clases teóricas',
            // 'Simuladores de conducción',
            // 'Conducción de motocicletas',
            // 'Conducción de autos',
            // 'Vehículos pesados',
            // 'Transporte de mercancías',
            // 'Vehículos eléctricos',
            // 'Mecánica básica',
            // 'Revisión técnica',
            // 'Conducción en lluvia',
            // 'Conducción nocturna',
            // 'Conducción en nieve',
            // 'Conducción en montaña',
            // 'Conducción en autopista',
            // 'Conducción en condiciones adversas',
            // 'Principiantes',
            // 'Conductores avanzados',
            // 'Conductores nerviosos',
            // 'Conducción para mayores',
            // 'Conducción para jóvenes',
            // 'Cursos para conductores profesionales'
        ];


        $colors = ['red', 'yellow', 'green', 'indigo', 'purple', 'pink'];

        foreach ($tags as $name) {
            Tag::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'color' => $colors[array_rand($colors)], // Selecciona un color aleatorio
            ]);
        }
    }
}
