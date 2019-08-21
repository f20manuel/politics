@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Escritorio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lideres.index') }}">Lideres</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar ({{ $lider->nombre }} {{ $lider->apellidos }})</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-3">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">Editar a {{ $lider->nombre }} {{ $lider->apellidos }}</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="card" action="{{ route('lideres.update', $lider->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h2><i class="fas fa-user align-middle mr-2"></i>Información Personal</h2>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" value="{{ $lider->nombre }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{ $lider->apellidos }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="{{ $lider->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control @error('cc') is-invalid @enderror" id="cc" name="cc" placeholder="Cédula de Ciudadanía" value="{{ $lider->cc }}" required>
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
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" data-tooltip="tooltip" title="Fecha de Nacimiento*" value="{{ $lider->fecha_nacimiento->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="genero_id" class="form-control">
                                            @foreach ($generos as $genero)
                                                @if ($genero->id == $lider->genero_id)
                                                    <option value="{{ $genero->id }}" selected>{{ $genero->name }}</option>
                                                @else
                                                    <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="celular" name="celular" placeholder="Número de Celular" value="{{ $lider->celular }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="telefonos" name="telefonos" placeholder="Número de Teléfono (opcional)" value="{{ $lider->telefonos }}">
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
                                                @if ($departamento->id == $lider->departamento_id)
                                                    <option value="{{ $departamento->id }}" selected>{{ $departamento->name }}</option>
                                                @else
                                                    <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select id="municipio_select" class="form-control" name="municipio_id">
                                            <?php $personaMunicipios = $municipios->where('departamento_id', $lider->departamento_id); ?>
                                            @if($ningunDepartamento->id == $lider->departamento_id)
                                                <option value="{{ $ningunMunicipio->id }}" selected disabeld>Debe seleccionar un Departamento</option>
                                            @else
                                                @foreach ($personaMunicipios as $municipio)
                                                    @if ($municipio->id == $lider->municipio_id)
                                                        <option value="{{ $municipio->id }}" selected>{{ $municipio->name }}</option>
                                                    @else
                                                        <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select id="comuna_select" class="form-control" name="comuna_id">
                                            <?php $personaComunas = $comuna_id->where('municipio_id', $lider->municipio_id)->where('departamento_id', $lider->departamento_id); ?>
                                            @if($ningunMunicipio->id == $lider->municipio_id)
                                                <option value="{{ $ningunaComuna->id }}" selected disabeld>Debe seleccionar un Departamento</option>
                                            @else
                                                @foreach ($personaComunas as $comuna)
                                                    @if ($ningunaComuna->id == $lider->comuna_id)
                                                        <option value="{{ $comuna->id }}" selected>{{ $comuna->name }}</option>
                                                    @else
                                                        <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección: Barrio, Calle, carrera o avenida (Opcional)" value="{{ $lider->direccion }}">
                                    </div>
                                </div>
                            </div>
                            <h2><i class="fas fa-user align-middle mr-2"></i>Información de Académica y Laboral</h2>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="nivel_academico_id" class="form-control">
                                            @foreach ($niveles_academicos as $nivel)
                                                @if ($nivel->id == $lider->nivel_academico_id)
                                                    <option value="{{ $nivel->id }}" selected>{{ $nivel->name }}</option>
                                                @else
                                                    <option value="{{ $nivel->id }}">{{ $nivel->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="ocupacion_id" class="form-control">
                                            @foreach ($ocupaciones as $ocupacion)
                                                @if ($ocupacion->id == $lider->ocupacion_id)
                                                    <option value="{{ $ocupacion->id }}" selected>{{ $ocupacion->name }}</option>
                                                @else
                                                    <option value="{{ $ocupacion->id }}">{{ $ocupacion->name }}</option>
                                                @endif
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
                                            @if ($ningunEstado->id == $lider->estado_apoyo_id)
                                                <option value="{{ $ningunEstado->id }}" selected>Estado de Apoyo</option>
                                            @else
                                                @foreach ($estado_apoyo as $estado)
                                                    <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="observacion" name="observacion" rows="3" placeholder="Observación...">{{ $lider->observacion }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
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
