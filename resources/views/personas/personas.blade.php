@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Escritorio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Personas</li>
        </ol>
    </nav>
@endsection
@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <input id="error" hidden value="{{ $error }}">
            @endforeach
        @endif
        <div class="header-body text-center mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">Gestión de Personas</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12">

                <!--Tabla de usuarios-->
                <div class="table-responsive">
                    <div>
                        <div class="row mx-0 align-items-center">
                            <div class="col-sm-12 text-center mb-4">
                                <nav @if($personas->lastPage() >= 23) style="width: 100%; padding-left: 75%; overflow-y: scroll;" @endif() aria-label="Page navigation example">
                                  <ul class="pagination justify-content-center">
                                    @if($personas->total() >= 10)
                                    <li class="page-item @if($personas->onFirstPage() == 1) disabled @endif">
                                      <a class="page-link" href="{{ $personas->previousPageUrl() }}">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Anterior</span>
                                      </a>
                                    </li>
                                    @for($i=1; $i<=$personas->lastPage(); $i++)
                                    <li class="page-item @if($personas->currentPage() == $i) active @endif()">
                                        <a class="page-link" href="{{ $personas->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    <li class="page-item">
                                      <a class="page-link @if($personas->currentPage() == $personas->lastPage()) disabled @endif" href="{{ $personas->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Siguiente</span>
                                      </a>
                                    </li>
                                    @endif
                                  </ul>
                                </nav>
                            </div>

                            <div class="col-md-8 pl-0 mb-2">
                                @can('personas.exportar')
                                <a href="{{ route('expersonas') }}">
                                <button class="btn btn-icon mr-2 btn-3 btn-secondary" type="sutmit">
                                	<span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                    <span class="btn-inner--text">Excel</span>
                                </button>
                                </a>
                                @endcan
                                    <input hidden id="importar" type="file" name="personasFile">
                                    <!-- Button trigger modal -->
                                        @can('personas.importar')
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#importarModal">
                                            Importar Excel
                                        </button>
                                        @endcan

                                        <!-- Modal -->
                                        <div class="modal fade" id="importarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('inpersonas') }}" accept-charset="utf-8" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Importar Personas</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <input type="file" id="importarExcel" name="importarExcel" class="form-control" accept=".xlsx, .csv, .ods" required>
                                                                    <small>Sólo archivos *.xlsx</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Importar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
      </div>
                                </form>
                                <span class="text-white">{{ $personas->total() }}
                                    @switch($personas->total())
                                        @case(1)
                                            Persona Registrada
                                            @break
                                        @default
                                            Personas Registradas
                                    @endswitch</span>
                            </div>
                            <div class="col-md-3 px-0 mb-2">
                                <div class="input-group input-group-alternative">
                                    <input class="form-control" placeholder="Buscar Número de Documento en Personas" name="search" type="text">
                                    <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 mb-2 px-0 text-right">
                                <button class="btn btn-icon btn-2 mr-0 btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#agregarPersona" data-placement="top" title="Agregar Persona" type="button">
                                	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                </button>

                                <!-- Formulario para agregar personas -->
                                <div class="modal fade" id="agregarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <form class="modal-content" action="{{ route('personas.save') }}" method="POST">
                                      @csrf
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-users fa-2x align-middle mr-2"></i>Agregar Personas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-left">
                                        <div class="row pb-0">
                                            <div class="col-md-6 mb-2">
                                                <h2><i class="fas fa-user align-middle mr-2"></i>Información Personal</h2>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <select class="form-control" name="lider_id">
                                                    <option value="{{ null }}" selected>Sin Asignar</option>
                                                    @foreach ($lideres as $lider)
                                                        <option value="{{ $lider->id }}">{{ $lider->nombre }} {{ $lider->apellidos }} - C.C. {{ number_format($lider->cc, 0, ',', '.') }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="mb-2 mt-n5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control @error('cc') is-invalid @enderror" id="cc" name="cc" placeholder="Cédula de Ciudadanía" required>
                                                    @error('cc')
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" data-tooltip="tooltip" title="Fecha de Nacimiento*" value="1970-01-01" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="genero_id" class="form-control">
                                                        <option value="{{ $ningunGenero->id }}" selected>Género</option>
                                                        @foreach ($generos as $genero)
                                                            <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" id="celular" name="celular" placeholder="Número de Celular" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" id="telefonos" name="telefonos" placeholder="Número de Teléfono (opcional)">
                                                </div>
                                            </div>
                                        </div>
                                        <h2><i class="fas fa-user align-middle mr-2"></i>Información de Residencia</h2>
                                        <hr class="my-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="departamento_id">
                                                        <option value="{{ $ningunDepartamento->id }}" selected>Departamento (opcional)</option>
                                                        @foreach ($departamentos as $departamento)
                                                            <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select id="municipio_select" class="form-control" name="municipio_id">
                                                        <option value="{{ $ningunMunicipio->id }}" selected disabeld>Debe seleccionar un Departamento</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select id="comuna_select" class="form-control" name="comuna_id">
                                                        <option value="{{ $ningunaComuna->id }}" selected disabeld>Debe seleccionar un Municipio</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección: Barrio, Calle, carrera o avenida">
                                                </div>
                                            </div>
                                        </div>
                                        <h2><i class="fas fa-user align-middle mr-2"></i>Información de Académica y Laboral</h2>
                                        <hr class="my-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="nivel_academico_id" class="form-control">
                                                        <option value="{{ $ningunNivel->id }}" selected>Nivel Académico</option>
                                                        @foreach ($niveles_academicos as $nivel)
                                                            <option value="{{ $nivel->id }}">{{ $nivel->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="ocupacion_id" class="form-control">
                                                        <option value="{{ $ningunaOcupacion->id }}" selected>Ocupación</option>
                                                        @foreach ($ocupaciones as $ocupacion)
                                                            <option value="{{ $ocupacion->id }}">{{ $ocupacion->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h2><i class="fas fa-user align-middle mr-2"></i>Información de Política</h2>
                                        <hr class="my-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <!--select name="lugar_votacion_id" class="form-control">
                                                    </select-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="estado_apoyo_id" class="form-control">
                                                        <option value="{{ $ningunEstado->id }}" selected>Estado de Apoyo</option>
                                                        @foreach ($estado_apoyo as $estado)
                                                            <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="observacion" rows="3" name="observacion" placeholder="Observación..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                        @if($personas->total() > 0)
                        <table class="table align-items-center table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        <i class="ni ni-badge mr-2"></i>Documento
                                    </th>
                                    <th scope="col">
                                        Información Personal
                                    </th>
                                    <th scope="col">
                                        Información de Contacto
                                    </th>
                                    <th scope="col">
                                        Información Política
                                    </th>
                                    <th>
                                        Opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="foreachPersonaSearch" class="list">
                                @foreach($personas as $persona)
                                <tr>
                                    <th scope="row" class="budget">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="mb-0 text-sm">
                                                    <h1 class="text-white mb-0"><i class="ni ni-badge"></i> <b>id: </b>{{ $persona->id }}</h1>
                                                    CC. {{ number_format($persona->cc, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="name">
                                        <strong>Nombres:</strong> {{ $persona->nombre }}
                                        <br>
                                        <strong>Apellidos:</strong> {{ $persona->apellidos }}
                                        <br>
                                        <strong>Edad:</strong> {{ date('Y') - $persona->fecha_nacimiento->format('Y') }} años
                                        <br>
                                        <strong>Nacimiento:</strong> {{ $persona->fecha_nacimiento->format('d/m/Y') }}
                                    </td>
                                    <td class="name">
                                        <strong>Celular:</strong> {{ $persona->celular }}
                                        <br>
                                        <strong>Telefonos:</strong> {{ $persona->telefonos }}
                                        <br>
                                        <strong>E-Mail:</strong> {{ $persona->email }}
                                        <br>
                                        <strong>Dirección:</strong>
                                        <?php
                                            $departamento = $departamentos->where('id', $persona->departamento_id)->first();
                                            $municipio = $municipios->where('id', $persona->municipio_id)->first();
                                        ?>
                                        <br>
                                        <small>{{ $persona->direccion }}</small>,
                                        <br>
                                        {{ $departamento->name }}, {{ $municipio->name }}
                                    </td>
                                    <td class="name">
                                        <?php
                                            $estado = $estado_apoyo->where('id', $persona->estado_apoyo_id)->first();
                                            $comuna = $comuna_id->where('id', $persona->comuna_id)->first();
                                            $lider = $lideres->where('id', $persona->lider_id)->first();
                                        ?>
                                        <strong>Lider: </strong> @if($lider){{$lider->nombre}} {{ $lider->apellidos }} @else Sin Asignar @endif
                                        <br>
                                        <strong>Comuna: </strong> @if($comuna){{ $comuna->name }}@endif
                                        <br>
                                        <strong>Lugar de Votacion:</strong>
                                        <br>
                                        <strong>Estado de Apoyo:</strong>
                                        {{ $estado->name }} <a href="javascript:void(0);" class="text-decoration-none text-light" data-tooltip="tooltip" title="Editar Estado de Apoyo" data-toggle="modal" data-target="#formEditEstado{{ $persona->id }}"><i class="far fa-edit"></i></a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#eliminarPersona{{ $persona->id }}">Eliminar</a>
                                                <a href="{{ route('personas.edit', $persona->id) }}" class="dropdown-item">Editar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @foreach($personas as $persona)
                            <!-- Form Edit Estado -->
                            <div class="modal fade" id="formEditEstado{{ $persona->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('personas.edit.estado', $persona->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cambiar estado de {{ $persona->nombre }} {{ $persona->apellidos }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <select name="estado_apoyo_id" class="form-control">';
                                                            @foreach ($estado_apoyo as $estado)
                                                                @if($estado->id == $persona->estado_apoyo_id)
                                                                    <option value="{{ $estado->id }}" selected>{{ $estado->name }}</option>
                                                                @else
                                                                    <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Eliminar Persona-->
                            <div class="modal fade" id="eliminarPersona{{ $persona->id }}" tabindex="-1" role="dialog" aria-labelledby="modalElimianrPersonaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="text-center p-5">
                                            <h1>¿Esta seguro?</h1>
                                                Si de verdad desea eliminar a<br><b>{{ $persona->nombre }} {{ $persona->apellidos }}</b>
                                                <br>
                                                pulse <b>Confirmar.</b>
                                                <hr class="my-5">
                                                <form action="{{ route('personas.delete', $persona->id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-group row justify-content-center">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                        @else
                        <table class="table align-items-center table-dark">
                            <tbody class="list">
                                <tr>
                                    <td class="name text-center">
                                        <h1 class="text-white">No hay Resultados</h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
                                <nav @if($personas->lastPage() >= 23) style="width: 100%; padding-left: 75%; overflow-y: scroll;" @endif() aria-label="Page navigation example">
                                  <ul class="pagination justify-content-center">
                                    @if($personas->total() >= 10)
                                    <li class="page-item @if($personas->onFirstPage() == 1) disabled @endif">
                                      <a class="page-link" href="{{ $personas->previousPageUrl() }}">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Anterior</span>
                                      </a>
                                    </li>
                                    @for($i=1; $i<=$personas->lastPage(); $i++)
                                    <li class="page-item @if($personas->currentPage() == $i) active @endif()">
                                        <a class="page-link" href="{{ $personas->url($i) }}">{{ $i }}</a>
                                    </li>
                                    @endfor
                                    <li class="page-item">
                                      <a class="page-link @if($personas->currentPage() == $personas->lastPage()) disabled @endif" href="{{ $personas->nextPageUrl() }}">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Siguiente</span>
                                      </a>
                                    </li>
                                    @endif
                                  </ul>
                                </nav>

            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('document').ready(function(){
        $('body').tooltip({
            selector: "[data-tooltip=tooltip]",
            container: "body"
        });

        var urlBorrar = $('#inputEliminar').val();

        $('#buttonEliminar').click(function(){
            swal({
                type: 'warning',
                title: '¿Quieres eliminar a esta persona?',
                text: 'Confirma que quiere borrar a esta persona',
                buttons: {
                    confirm: true,
                    cancel: false
                }
            }).then(function(){
                var id = $('#inputId').val();
                $.ajax({
                    url: urlBorrar,
                    data: {id:id},
                    type: 'POST',
                    success: function(data){
                        window.location.reload();
                    }
                });
            });
        });
    });
</script>
@endsection
