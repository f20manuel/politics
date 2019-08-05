<?php

use App\Genero;
use Illuminate\Database\Seeder;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new Genero();
        $genero->name = 'Hombre';
        $genero->save();
        
        $genero = new Genero();
        $genero->name = 'Mujer';
        $genero->save();
        
        $genero = new Genero();
        $genero->name = 'LGBTI';
        $genero->save();
        
        $genero = new Genero();
        $genero->name = 'No Aplica';
        $genero->save();
    }
}
