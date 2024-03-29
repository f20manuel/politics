<?php

namespace App\Exports;

use App\Persona;
use App\Genero;
use App\Departamento;
use App\Municipio;
use App\Ocupacion;
use App\NivelAcademico;
use App\LVotacion;
use App\EstadoApoyo;
use App\Comuna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PersonasExport implements FromView
{
    public function view(): View
    {
        return view('personas.personasExport', [
            'personas' => Persona::all(),
            'generos' => Genero::all(),
            'departamentos' => Departamento::all(),
            'municipios' => Municipio::all(),
            'comuna_id' => Comuna::all(),
            'ocupaciones' => Ocupacion::all(),
            'niveles_academicos' => NivelAcademico::all(),
            'estado_apoyo' => EstadoApoyo::all()
        ]);
    }
}
