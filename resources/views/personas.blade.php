@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
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
                    
                            <div class="col-md-6 pl-0 mb-2">
                                <a href="{{ route('expersonas') }}">
                                <button class="btn btn-icon mr-2 btn-3 btn-secondary" type="sutmit">
                                	<span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                	
                                    <span class="btn-inner--text">Excel</span>
                                </button>
                                </a>
                                <span class="text-white">Mostrando {{ $personas->count() }} de {{ $personas->total() }} resultados</span>
                            </div>
                            <div class="col-md-5 px-0 mb-2">
                                <form action="{{ route('searchPersonas') }}" method="GET">
                                    <div class="input-group input-group-alternative">
                                      <input class="form-control" placeholder="Buscar Número de Documento en Personas" name="search" type="text">
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-1 mb-2 px-0 text-right">
                                <button class="btn btn-icon btn-2 mr-0 btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#agregarPersona" data-placement="top" title="Agregar Persona" type="button">
                                	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                </button>
                                
                                <!-- Formulario para agregar personas -->
                                <div class="modal fade" id="agregarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-users fa-2x align-middle mr-2"></i>Agregar Personas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <h2><i class="fas fa-user align-middle mr-2"></i>Información Personal</h2>
                                        <hr class="my-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
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
                                                    <input type="number" class="form-control" id="cc" name="cc" placeholder="Cédula de Ciudadanía" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" data-tooltip="tooltip" title="Fecha de Nacimiento" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 id="edad"></h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="celular" name="celular" placeholder="Número de Celular (opcional)">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="telefonos" name="telefonos" placeholder="Número de Teléfono (opcional)">
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-default" data-dismiss="modal">Guardar y Agregar otro</button>
                                        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
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
                                </tr>
                            </thead>
                            <tbody class="list">
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
                                        <strong>Nombre:</strong> {{ $persona->nombre }}
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
                                        {{ $persona->direccion }},
                                        <br>
                                        {{ $departamento->name }}, {{ $municipio->name }}
                                    </td>
                                    <td class="name">
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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
    });
</script>
@endsection