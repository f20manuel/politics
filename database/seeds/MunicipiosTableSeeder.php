<?php

use App\Departamento;
use App\Municipio;
use Illuminate\Database\Seeder;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tolima = Departamento::where('name', 'Tolima')->first();
        
        $municipio = new Municipio;
        $municipio->name = 'Ibagué';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Alpujarra';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Alpujarra';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Alvarado';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Alvarado';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Ambalema';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Ambalema';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Anzoátegui';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Anzoátegui';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Guayabal';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Armero Guayabal';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Ataco';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Cajamarca';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Apicalá';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Carmen de Apicalá';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Casabianca';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Chaparral';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Coello';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Coyaima';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Cunday';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Dolores';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'El Espinal';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'El Guamo';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Falan';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Flandes';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Fresno';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Herveo';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Honda';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Icononzo';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Lérida';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Líbano';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Melgar';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Murillo';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Natagaima';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Ortega';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Palocabildo';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Piedras';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Planadas';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Prado';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Purificación';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Rioblanco';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Roncesvalles';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Rovira';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Saldaña';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'San Antonio';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'San Luis';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'San Sebastián de Mariquita';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Santa Isabel';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Suárez';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Valle de San Juan';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Venadillo';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Villahermosa';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
        
        $municipio = new Municipio;
        $municipio->name = 'Villarrica';
        $municipio->departamento_id = $tolima->id;
        $municipio->save();
    }
}
