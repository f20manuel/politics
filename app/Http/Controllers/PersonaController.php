<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Departamento;
use App\Municipio;
use App\Ocupacion;
use App\NivelAcademico;
use App\LVotacion;
use App\EstadoApoyo;
use App\Exports\PersonasExport;
use Illuminate\Http\Request;
use Excel;

class PersonaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $personas = Persona::paginate(50);
        
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        $ocupaciones = Ocupacion::all();
        $niveles_academicos = NivelAcademico::all();
        $estado_apoyo = EstadoApoyo::all();
        
        $lugar_votacion = LVotacion::all();
        
            return view('personas', compact([
                'personas',
                'departamentos',
                'municipios',
                'ocupaciones',
                'niveles_academicos',
                'estado_apoyo',
                'lugar_votacion'
            ]));
    }
    
    public function searchByDNI(Request $request)
    {
        $persona = Persona::where('cc', 'LIKE', '%'.$request->get('search').'%')->first();
        
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        
        $ocupaciones = Ocupacion::all();
        $niveles_academicos = NivelAcademico::all();
        
        $lugar_votacion = LVotacion::all();
        
            return view('personasearch', compact([
                'persona',
                'departamentos',
                'municipios',
                'ocupaciones',
                'niveles_academicos',
                'estado_apoyo',
                'lugar_votacion'
            ]));
        
    }
    
    public function ExportarExcel()
    {
        return Excel::download(new PersonasExport, 'personas.xlsx');
    }
}
