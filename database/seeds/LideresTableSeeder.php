<?php

use App\Lider;
use Illuminate\Database\Seeder;

class LideresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lider = new Lider();
        $lider->nombre = 'Sin Asignar';
        $lider->cc = '000000000000';
        $lider->celular = '0000000000';
        $lider->comuna_id = '20';
        $lider->save();
    }
}
