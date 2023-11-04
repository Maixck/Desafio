<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $newCiudad=  \App\Models\Ciudad::create([
            'nombre'  => 'Asunción',
        ]);
        $newCiudad=  \App\Models\Ciudad::create([
            'nombre'  => 'Lambaré',
        ]);
        $newCiudad=  \App\Models\Ciudad::create([
            'nombre'  => 'San Lorenzo',
        ]);


        $newPropietario=  \App\Models\Propietario::create([
            'nombre'  => 'Marcelo',
            'email'  => 'marce@gmail.com',
            'telefono'  => '+595991555444',
        ]);
        $newPropietario=  \App\Models\Propietario::create([
            'nombre'  => 'Ivan',
            'email'  => 'ivan@gmail.com',
            'telefono'  => '+595991321123',
        ]);
        $newPropietario=  \App\Models\Propietario::create([
            'nombre'  => 'Jose',
            'email'  => 'jose@gmail.com',
            'telefono'  => '+595981111222',
        ]);

        $newLote =  \App\Models\Lote::create([
            'codigo'    => 'a001',
            'valor'     => 1000000000,
            'ciudad_id' => 1,
            'propietario_id'=> 1,
        ]);

        $newLote =  \App\Models\Lote::create([
            'codigo'  => 'a001',
            'valor'   => 2000000000,
            'ciudad_id' => 2,
            'propietario_id'=> 2,
        ]);

        $newLote =  \App\Models\Lote::create([
            'codigo'  => 'a001',
            'valor'   => 3000000000,
            'ciudad_id' => 3,
            'propietario_id'=> 3,
        ]);

        $newUser = \App\Models\User::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => 'admin',
        ]);
    }
}
