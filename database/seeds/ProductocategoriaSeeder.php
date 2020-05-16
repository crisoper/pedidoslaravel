<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductocategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 5; $i++) { 
            DB::table('productocategorias')->insert([
                'empresa_id' => 1,
                'nombre' => Str::random(15)
            ]);
        }

    }
}
