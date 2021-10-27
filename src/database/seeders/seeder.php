<?php

namespace Database\Seeders;

use Nowyouwerkn\WeTask\Models\Contacts;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        Contacts::create
        ([
            'nombre'=> 'Example',
            'telefono' => '477-000-000',
            'correo' => 'correo@correo.com',
            'estado' => 'Registro nuevo',
            
        ]);
    }
}