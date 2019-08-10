@extends('layouts.app')
@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-3">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Editar a {{ $persona->nombre }} {{ $persona->apellidos }}</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="card" action="{{ route('updatePersona2') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h2><i class="fas fa-user align-middle mr-2"></i>Información Personal</h2>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" value="{{ $persona->nombre }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{ $persona->apellidos }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="{{ $persona->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="cc" name="cc" placeholder="Cédula de Ciudadanía" value="{{ $persona->cc }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" data-tooltip="tooltip" title="Fecha de Nacimiento*" value="{{ $persona->fecha_nacimiento->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="genero_id" class="form-control">
                                            @foreach ($generos as $genero)
                                                @if ($genero->id == $persona->genero_id)
                                                    <!--option value="{{ $genero->id }}" selected>{{ $genero->name }}</option-->
                                                @endif
                                                <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                        <textarea class="form-control" id="observacion" rows="3" placeholder="Observación..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Guardar y Agregar otro</button>
                            <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
@endsection
