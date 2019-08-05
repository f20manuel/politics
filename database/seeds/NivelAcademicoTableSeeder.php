<?php

use App\NivelAcademico;
use Illuminate\Database\Seeder;

class NivelAcademicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel = new NivelAcademico();
        $nivel->name = 'Universitario';
        $nivel->save();
        
        $nivel = new NivelAcademico();
        $nivel->name = 'Bachiller';
        $nivel->save();
        
        $nivel = new NivelAcademico();
        $nivel->name = 'Primaria';
        $nivel->save();
    }
}
