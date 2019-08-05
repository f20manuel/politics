<?php

use App\Ocupacion;
use Illuminate\Database\Seeder;

class OcupacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new Ocupacion();
        $job->name = 'Empleado';
        $job->save();
        
        $job = new Ocupacion();
        $job->name = 'Desempleado';
        $job->save();
        
        $job = new Ocupacion();
        $job->name = 'Estudiante';
        $job->save();
        
        $job = new Ocupacion();
        $job->name = 'Independiente';
        $job->save();
        
        $job = new Ocupacion();
        $job->name = 'Otro';
        $job->save();
    }
}
