<?php

namespace App\Http\Controllers;

use App\Lider;
use App\Persona;
use App\Genero;
use App\Departamento;
use App\Municipio;
use App\Ocupacion;
use App\NivelAcademico;
use App\LVotacion;
use App\EstadoApoyo;
use App\Comuna;
use Illuminate\Http\Request;
use App\Exports\LiderExport;
use Maatwebsite\Excel\Files\ExcelFile as ExcelImport;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Excel;
use Alert;

class LiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $personas)
    {
        $lideres = lider::orderBy('id', 'desc')->paginate(500);

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

            return view('personas.lideres', compact([
                'personas',
                'lideres',
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'cc' => 'unique:liders'
        ]);

        $lider = Lider::create($request->all());

        if($lider)
        {
            alert()->success('El/La lider '.$request->input('nombre').' '.$request->input('apellidos').', ha sido agregad@ con éxito', 'Nuev@ Lider Guardado');
            return back();
        }else{
            alert()->error('Disculpa ha ocurrido un error', '¡Ups!');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $lideres = Lider::where('cc', 'LIKE', '%'.$search.'%')
              ->orWhere('nombre', 'LIKE', '%'.$search.'%')
              ->orWhere('apellidos', 'LIKE', '%'.$search.'%')
              ->orWhere('celular', 'LIKE', '%'.$search.'%')
              ->orWhere('email', 'LIKE', '%'.$search.'%')
              ->paginate(500);
              if($lideres)
              {
                  foreach($lideres as $persona){
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
              }else{
                  echo '
                      <div class="row justify-content-center">
                          <div class="col-md-12 text-center">
                              <h1 class="h1 text-white">No se encontraron resultados para "'.$search.'".</h1>
                          </div>
                      </div>
                  ';
              }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lider $lider, Persona $personas)
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

        return view('personas.editarLider', compact([
            'personas',
            'lider',
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

    public function updateEstado(Request $request, Lider $lider)
    {
        $estado = $request->input('estado_apoyo_id');
        $estado_actual = EstadoApoyo::where('id', $estado)->first();
        $editar = $lider->update([
            'estado_apoyo_id' => $estado_actual->id
        ]);

        if($editar){
            alert()->success('Estado de apoyo de '.$lider->nombre.' '.$lider->apellidos.' cambiado a '.$estado_actual->name, 'Estado Cambiado');
            return back();
        }else{
            alert()->error('Algo ha ocurrido mal, por favor intente de nuevo', '¡Ups!');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lider $lider)
    {
        if($request->input('cc') != $lider->cc)
        {
            $validate = $request->validate([
                'cc' => 'unique:liders'
            ]);
        }

        $update = $lider->update($request->all());

        if($update)
        {
            alert()->success('Los dato de '.$request->input('nombre').' '.$request->input('apellidos').', se han actualizado con éxito.', '¡Muy Bien!');
            return redirect()->route('lideres.index');
        }else{
            alert()->error('Lo sentimos ha ocurrido un error', '¡Ups!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lider = Lider::findOrFail($id);
        $lider->delete();

        if($lider)
        {
            alert()->success('El/La lider '.$lider->nombre.' '.$lider->apellidos.' se ha eliminado con éxito', '¡Listo!');
            return back();
        }else{
            alert()->error('Algo ha salido mal, por favor intente de nuevo...', '¡Ups!');
            return back();
        }
    }

    public function ImportarExcel(Request $request)
    {
        //return Excel::import(new PersonasImport, $_FILES['importarExcel']['name']);
        Excel::import(new LideresImport, $request->file('importarExcel'));
        return back();
    }

    public function ExportarExcel()
    {
        return Excel::download(new LiderExport, 'lideres.xlsx');
    }
}
