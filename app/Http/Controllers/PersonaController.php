<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Genero;
use App\Departamento;
use App\Municipio;
use App\Ocupacion;
use App\NivelAcademico;
use App\LVotacion;
use App\EstadoApoyo;
use App\Comuna;
use App\Exports\PersonasExport;
use App\Imports\PersonasImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Files\ExcelFile as ExcelImport;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Excel;
use Alert;

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
        $personas = Persona::paginate(500);

        $generos = Genero::all();
        $ningunGenero = $generos->last();

        $departamentos = Departamento::all();
        $ningunDepartamento = $departamentos->last();

        $municipios = Municipio::all();
        $ningunMunicipio = $municipios->last();

        $comuna_id = Comuna::all();
        $ningunaComuna = $comuna_id->last();

        $ocupaciones = Ocupacion::all();
        $ningunaOcupacion = $ocupaciones->last();

        $niveles_academicos = NivelAcademico::all();
        $ningunNivel = $niveles_academicos->last();

        $estado_apoyo = EstadoApoyo::all();
        $ningunEstado = $estado_apoyo->last();

        $lugar_votacion = LVotacion::all();
        $ningunLV = $lugar_votacion->last();

            return view('personas.personas', compact([
                'personas',
                'generos',
                'ningunGenero',
                'departamentos',
                'ningunDepartamento',
                'municipios',
                'ningunMunicipio',
                'comuna_id',
                'ningunaComuna',
                'ocupaciones',
                'ningunaOcupacion',
                'niveles_academicos',
                'ningunNivel',
                'estado_apoyo',
                'ningunEstado',
                'lugar_votacion',
                'ningunLV'
            ]));
    }

    public function edit(Persona $persona)
    {

        $generos = Genero::all();
        $ningunGenero = $generos->last();

        $departamentos = Departamento::all();
        $ningunDepartamento = $departamentos->last();

        $municipios = Municipio::all();
        $ningunMunicipio = $municipios->last();

        $comuna_id = Comuna::all();
        $ningunaComuna = $comuna_id->last();

        $ocupaciones = Ocupacion::all();
        $ningunaOcupacion = $ocupaciones->last();

        $niveles_academicos = NivelAcademico::all();
        $ningunNivel = $niveles_academicos->last();

        $estado_apoyo = EstadoApoyo::all();
        $ningunEstado = $estado_apoyo->last();

        $lugar_votacion = LVotacion::all();
        $ningunLV = $lugar_votacion->last();

        return view('personas.editar', compact([
            'persona',
            'generos',
            'ningunGenero',
            'departamentos',
            'ningunDepartamento',
            'municipios',
            'ningunMunicipio',
            'comuna_id',
            'ningunaComuna',
            'ocupaciones',
            'ningunaOcupacion',
            'niveles_academicos',
            'ningunNivel',
            'estado_apoyo',
            'ningunEstado',
            'lugar_votacion',
            'ningunLV'
            ]));
    }

    public function selectDepartamento(Request $request)
    {
        $departamento = $request->input('departamento_id');
        $municipios = Municipio::where('departamento_id', $departamento)->get();
        $ningunMunicipio = Municipio::where('name', 'Ninguno')->first();

        if($municipios->count() > 0)
        {
        echo '<option value="'.$ningunMunicipio->id.'" selected>Municipio (opcional)</option>'?>
                <?php foreach($municipios as $municipio){
                    echo '<option value="'.$municipio->id.'">'.$municipio->name.'</option>';
                };
        }
        else {
            echo '<option value="'.$ningunMunicipio->id.'" selected disabled>No hay municipios</option>';
        }
    }

    public function selectMunicipio(Request $request)
    {
        $departamento = $request->input('departamento_id');
        $municipio = $request->input('municipio_id');
        $comunas = Comuna::where([['departamento_id', $departamento], ['municipio_id', $municipio]])->get();
        if($comunas->count() > 0)
        {
            echo '<option disabled selected>Comuna (Requerido)</option>'?>
            <?php foreach($comunas as $comuna){
                echo '<option value="'.$comuna->id.'">'.$comuna->name.'</option>';
                echo '  <script>
                            $("#comuna_select").attr("required", true);
                        </script>';
            };
        }else{
            echo '<option disabled selected>No hay Comunas para este municipio</option>';
            echo '  <script>
                        $("#comuna_select").attr("required", false);
                    </script>';
        };
    }

    public function guardar(Request $request)
    {
        $personas = Persona::create($request->all());

        if($personas)
        {
            alert()->success('La persona '.$request->input('nombre').' '.$request->input('apellidos').', ha sido agregada con éxito', 'Persona Guardada');
            return back();
        }else{
            alert()->error('Disculpa ha ocurrido un error', '¡Ups!');
            return back();
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $personas = Persona::where('cc', 'LIKE', '%'.$search.'%')
                            ->orWhere('nombre', 'LIKE', '%'.$search.'%')
                            ->orWhere('fecha_nacimiento', 'LIKE', '%'.$search.'%')
                            ->orWhere('celular', 'LIKE', '%'.$search.'%')
                            ->orWhere('telefonos', 'LIKE', '%'.$search.'%')
                            ->orWhere('apellidos', 'LIKE', '%'.$search.'%')
                            ->orWhere('direccion', 'LIKE', '%'.$search.'%')
                            ->paginate(10);

        foreach($personas as $persona){
            $fecha_cumpleanos = date('Y') - $persona->fecha_nacimiento->format('Y');
            $estado_apoyo = EstadoApoyo::all();
            $departamento = Departamento::where('id', $persona->departamento_id)->first();
            $municipio = Municipio::where('id', $persona->municipio_id)->first();
            $estado = EstadoApoyo::where('id', $persona->estado_apoyo_id)->first();
            $comuna = Comuna::where('id', $persona->comuna_id)->first();
            echo '
                <tr>
                    <th scope="row" class="budget">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <span class="mb-0 text-sm">
                                    <h1 class="text-white mb-0"><i class="ni ni-badge"></i> <b>id: </b>'.$persona->id.'</h1>
                                    CC. '.number_format($persona->cc, 0, ',', '.').'
                                </span>
                            </div>
                        </div>
                    </th>
                    <td class="name">
                        <strong>Nombres:</strong> '.$persona->nombre.'
                        <br>
                        <strong>Apellidos:</strong> '.$persona->apellidos.'
                        <br>
                        <strong>Edad:</strong> '.$fecha_cumpleanos.' años
                        <br>
                        <strong>Nacimiento:</strong> '.$persona->fecha_nacimiento->format('d/m/Y').'
                    </td>
                    <td class="name">
                        <strong>Celular:</strong> '.$persona->celular.'
                        <br>
                        <strong>Telefonos:</strong> '.$persona->telefonos.'
                        <br>
                        <strong>E-Mail:</strong> '.$persona->email.'
                        <br>
                        <strong>Dirección:</strong>
                        <br>
                        <small>'.$persona->direccion.'</small>,
                        <br>
                        '.$departamento->name.', '.$municipio->name.'
                    </td>
                    <td class="name">
                        <strong>Comuna: </strong> ';
                        if($comuna){
                            echo $comuna->name;
                        }
                    echo '
                        <br>
                        <strong>Lugar de Votacion:</strong>
                        <br>
                        <strong>Estado de Apoyo:</strong>
                        '.$estado->name.' <a href="javascript:void(0);" class="text-decoration-none text-light" data-tooltip="tooltip" title="Editar Estado de Apoyo" data-toggle="modal" data-target="#formEditEstado'.$persona->id.'"><i class="far fa-edit"></i></a>
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a id="buttonEliminar" class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#eliminarPersona'.$persona->id.'">Eliminar</a>
                                <a href="/public/persona/'.$persona->id.'/edit" class="dropdown-item">Editar</a>
                            </div>
                        </div>
                    </td>
                </tr>';
        }
    }

    public function updateEstado(Request $request, Persona $persona)
    {
        $estado = $request->input('estado_apoyo_id');
        $estado_actual = EstadoApoyo::where('id', $estado)->first();
        $editar = $persona->update([
            'estado_apoyo_id' => $estado_actual->id
        ]);

        if($editar){
            alert()->success('Estado de apoyo de '.$persona->nombre.' '.$persona->apellidos.' cambiado a '.$estado_actual->name, 'Estado Cambiado');
            return back();
        }else{
            alert()->error('Algo ha ocurrido mal, por favor intente de nuevo', '¡Ups!');
            return back();
        }
    }

    public function update(Request $request, Persona $persona)
    {
        $update = $persona->update($request->all());

        if($update)
        {
            alert()->success('Los dato de '.$request->input('nombre').' '.$request->input('apellidos').', se han actualizado con éxito.', '¡Muy Bien!');
            return redirect()->route('personas');
        }else{
            alert()->error('Lo sentimos ha ocurrido un error', '¡Ups!');
            return redirect()->back();
        }

        return redirect()->route('personas');
    }

    public function eliminar(Persona $persona)
    {
        $persona->delete();
        alert()->success('¡'.$persona->nombre.' '.$persona->apellidos.' ha sido borrad@ con exito!');
        return back();
    }

    public function ImportarExcel(Request $request)
    {
        //return Excel::import(new PersonasImport, $_FILES['importarExcel']['name']);
        Excel::import(new PersonasImport, $request->file('importarExcel'));
        return back();
    }

    public function ExportarExcel()
    {
        return Excel::download(new PersonasExport, 'personas.xlsx');
    }
}
