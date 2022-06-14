<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayCiudades = [
            ['nombre'=>'Armenia','created_at'=>now()], 
            ['nombre'=>'Bogotá','created_at'=>now()], 
            ['nombre'=>'Bucaramanga','created_at'=>now()], 
            ['nombre'=>'Cali','created_at'=>now()], 
            ['nombre'=>'Medellín','created_at'=>now()], 
            ['nombre'=>'Pereira','created_at'=>now()], 
            ['nombre'=>'Popayán','created_at'=>now()]
        ];

        DB::table('ciudades')->insert($arrayCiudades);
    }
}
