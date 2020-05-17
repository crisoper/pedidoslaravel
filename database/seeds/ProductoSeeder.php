<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker;

        for ($i=0; $i < 50; $i++) { 
            DB::table('productos')->insert([
                'empresa_id' => 1,
                'codigo' => Str::random(15),
                'categoria_id' => rand(1, 5),
                'descripcion' => Str::random(75),
                'nombre' => Str::random(25),
                'precio' => rand(100, 2500),
                'stock' => 0,
            ]);
        }

    }
}
