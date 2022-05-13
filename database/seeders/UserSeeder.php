<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Sergio Lopez Perez',
            'slug' => 'sergio-lopez-perez',
            'email' => 'sergio@gmail.com',
            'telefono' =>'1111122222',
            'password'=> Hash::make('12345678'),
            'rol' => 'Administrador',
        ]);
        
        User::create([
            'nombre' => 'Claudia Anaya Carreño',
            'slug' => 'claudia-anaya-carreño',
            'email' => 'claudia@gmail.com',
            'telefono' =>'1111122222',
            'password'=> Hash::make('5678'),
            'rol' => 'Administrador',
        ]);

        User::create([
            'nombre' => 'Empleado 1',
            'slug' => 'empleado-1',
            'email' => 'empleado1@gmail.com',
            'telefono' =>'1111122222',
            'password'=> encrypt('123456789'),
            'rol' => 'Empleado',
        ]);

        User::create([
            'nombre' => 'Empleado 2',
            'slug' => 'empleado-2',
            'email' => 'empleado2@gmail.com',
            'telefono' =>'1111122222',
            'password'=> encrypt('123456789'),
            'rol' => 'Empleado',
        ]);
    }
}
