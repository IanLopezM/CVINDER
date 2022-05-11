<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectores = [
            'Programador Web Junior', 'Programador Web Senior', 'Programador Mobil Junior',
            'Programador Mobil Senior', 'Consultor Tecnológico', 'Diseñador de Sistemas Informaticos',
            'Responsable de Entornos de Seguridad', 'Administrador de Sistemas y Redes', 
            'Analista de Sistemas Informáticos', 'Creador de Videojuegos', 'Creador de Aplicaciones',
            'Creador de Videojuegos y Aplicacions', 'Especialista SEO', 'Gestor de Proyectos Informáticos',
            'Diseñador de Arquitecturas de Software', 'Docente', 'Analista', 'Técnico Microinformático',
            'Consultor Junior', 'Consultor Senior'
        ];

        for ($i = 0; $i < count($sectores); $i++) {
            Sector::create([
                'name' => $sectores[$i],
            ]);
        }
    }
}
