<?php

namespace App\Imports;

use App\Persona;
use Maatwebsite\Excel\Concerns\ToModel;

//for functions
use App\Departamento;
use App\Municipio;
use App\Genero;
use App\Ocupacion;
use App\NivelAcademico;
use App\EstadoApoyo;

use DateTime;
use IntlDateFormatter;

class PersonasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        function departamento($name)
        {
            $departamento = Departamento::where('name', $name)->first();
            return $departamento->id;
        }

        function municipio($name)
        {
            $municipio = Municipio::where('name', $name)->first();
            return $municipio->id;
        }

        function genero($name)
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


        return new Persona([
            'cc' => $row[0],
            'nombre' => $row[1],
            'apellidos' => $row[2],
            'celular' => $row[3],
            'telefonos' => $row[4],
            'email' => $row[5],
            'departamento_id' => departamento($row[6]),
            'municipio_id' => municipio($row[7]),
            'direccion' => $row[8],
            'genero_id' => genero($row[9]),
            'fecha_nacimiento' => date('Y-m-d', strtotime($row[10])),
            'ocupacion_id' => ocupacion($row[11]),
            'nivel_academico_id' => nivelAcademico($row[12]),
            'estado_apoyo_id' => estadoApoyo($row[13]),
            'observacion' => $row[14],
        ]);
    }
}
