<?php

//for functions
use App\Departamento;
use App\Municipio;
use App\Comuna;
use App\Genero;
use App\Ocupacion;
use App\NivelAcademico;
use App\EstadoApoyo;

function departamentos($name)
{
    $departamento = Departamento::where('name', $name)->first();
    return $departamento->id;
}

function municipios($name)
{
    $municipio = Municipio::where('name', $name)->first();
    return $municipio->id;
}

function comunas($name, $departamentoName, $municipioName)
{
    $departamento_id = Departamento::where('name', $departamentoName)->first();
    $municipio_id = Municipio::where('name', $municipioName)->first();
    $comuna = Comuna::where([['name', $name],['departamento_id', $departamento_id->id],['municipio_id', $municipio_id->id]])->first();
    return $comuna->id;
}

function generos($name)
{
    $genero = Genero::where('name', $name)->first();
    return $genero->id;
}

function ocupacion($name)
{
    $ocupacion = Ocupacion::where('name', $name)->first();
    return $ocupacion->id;
}

function nivelAcademico($name)
{
    $nivelAcademico = NivelAcademico::where('name', $name)->first();
    return $nivelAcademico->id;
}

function estadoApoyo($name)
{
    $estadoApoyo = EstadoApoyo::where('name', $name)->first();
    return $estadoApoyo->id;
}

?>
