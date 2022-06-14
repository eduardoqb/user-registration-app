<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_tipo_documento = [ 1, 2, 3 ];
        $array_id_ciudad = [ 1, 2, 3, 4, 5, 6 ];

        for($i=0; $i<5; $i++){

            $timestamp = mt_rand(0, 1084067816);
            //Format that timestamp into a readable date string.
            $randomDate = date("Y-m-d", $timestamp);

            DB::table('usuarios')->insert([
                'tipo_documento' => Arr::random($array_tipo_documento),
                'cedula' => random_int(1000000000,1111199999),
                'nombres' => Str::random(10),
                'apellidos' => Str::random(10),
                'fecha_nacimiento' => $randomDate,
                'ciudad_nacimiento_id' => Arr::random($array_id_ciudad),
                'email' => Str::random(8).'@gmail.com',
                'password' => Hash::make('password'),
                'created_at'=>now()
            ]);
        }
    }
}
