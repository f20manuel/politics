<?php

use App\Departamento;
use App\Municipio;
use App\Comuna;
use Illuminate\Database\Seeder;

class ComunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Todos los departamentos
        $departamentos = Departamento::all();
        $municipios = Municipio::all();

        //Tolima
        $tolima = Departamento::where('name', 'Tolima')->first();
        $ibague = Municipio::where('name', 'Ibagué')->first();

        //Comunas desde la 1 a la 13
        for($i=1; $i<=13; $i++)
        {
            $comuna = new Comuna();
            $comuna->name = 'Comuna '.$i;
            $comuna->departamento_id = $tolima->id;
            $comuna->municipio_id = $ibague->id;
            $comuna->save();
        }


        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 1 - Dantas';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 2 – Laureles';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 3 – Coello Cocora';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 4 –Gamboa';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 5 – tapias';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 6 – Toche';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 7 – Juntas';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 8 – Villarestrepo';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 9 –Cay';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 10 –Calambeo';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 11 – San Juan de la China';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 12 – San Bernando';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 13 –    Salado';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 14 –  Buenos aires';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 15 – Carmen de Bulira';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 16 – Totumo';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = 'Corregimiento 17 – La Florida';
        $comuna->departamento_id = $tolima->id;
        $comuna->municipio_id = $ibague->id;
        $comuna->save();

        for($m=1; $m<=$municipios->count(); $m++)
        {
            for($d=1; $d<=$departamentos->count(); $d++)
            {
                $comuna = new Comuna();
                $comuna->name = 'Ninguna';
                $comuna->departamento_id = $d;
                $comuna->municipio_id = $m;
                $comuna->save();
            }
        }
    }
}
