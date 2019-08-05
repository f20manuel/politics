<?php

use App\Departamento;
use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = new Departamento();
        $departamento->name = 'Amazonas';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Antioquia';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Arauca';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Atlántico';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Bolívar';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Boyacá';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Caldas';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Caquetá';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Casanare';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Cauca';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Cesar';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Chocó';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Córdoba';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Cundinamarca';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Guainía';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Guaviare';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Huila';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'La Guajira';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Magdalena';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Meta';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Nariño';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Norte de Santander';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Putumayo';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Quindío';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Risaralda';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'San Andrés y Providencia';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Santander';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Sucre';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Tolima';
        $departamento->active = true;
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Vaupés';
        $departamento->save();
        
        $departamento = new Departamento();
        $departamento->name = 'Vichada';
        $departamento->save();
    }
}
