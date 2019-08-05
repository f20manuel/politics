<?php

use App\EstadoApoyo;
use Illuminate\Database\Seeder;

class EstadoApoyoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = new EstadoApoyo();
        $estado->name = 'Comprometido';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'Indeciso';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'Contactado';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'No Apoya';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'Llamado 1ra Vez';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'Llamado 2da Vez';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'Llamado 3ra Vez';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'No es el número de titular';
        $estado->save();
        
        $estado = new EstadoApoyo();
        $estado->name = 'No contactado';
        $estado->save();
    }
}
