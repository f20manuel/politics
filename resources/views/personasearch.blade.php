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
                            <div class="col-md-8 pl-0 mb-2">
                                <a href="{{ route('expersonas') }}">
                                <button class="btn btn-icon mr-2 btn-3 btn-secondary" type="sutmit">
                                	<span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                	
                                    <span class="btn-inner--text">Excel</span>
                                </button>
                                </a>
                            </div>
                            <div class="col-md-4 pr-0 mb-2">
                                <form action="{{ route('searchPersonas') }}" method="GET">
                                    <div class="input-group input-group-alternative">
                                      <input class="form-control" placeholder="Buscar Número de Documento en Personas" name="search" type="text">
                                      <div class="input-group-append">
                                        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(!is_null($persona))
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