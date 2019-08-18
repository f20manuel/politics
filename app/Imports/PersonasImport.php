<?php

namespace App\Imports;

use App\Persona;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use DateTime;
use IntlDateFormatter;

class PersonasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!is_null($row['departamento']))
        {
            $departamento = $row['departamento'];
        }
        else
        {
            $departamento = 'Ninguno';
        }

        if(!is_null($row['municipio']))
        {
            $municipio = $row['municipio'];
        }
        else{
            $municipio = 'Ninguno';
        }

        if(!is_null($row['comuna']))
        {
            $comuna = $row['comuna'];
        }
        else
        {
            $comuna = 'Ninguna';
        }

        if(!is_null($row['genero']))
        {
            $genero = $row['genero'];
        }
        else
        {
            $genero = 'No Aplica';
        }

        if(!is_null($row['fechanacimiento']))
        {
            $fecha = Date::excelToDateTimeObject($row['fechanacimiento']);
        }
        else
        {
            $fecha = '1970-01-01';
        }

        if(!is_null($row['ocupacion']))
        {
            $ocupacion = $row['ocupacion'];
        }
        else
        {
            $ocupacion = 'Otro';
        }

        if(!is_null($row['nivelacademico']))
        {
            $nivel = $row['nivelacademico'];
        }
        else
        {
            $nivel = 'Ninguno';
        }

        if(!is_null($row['estadoapoyo']))
        {
            $estado = $row['estadoapoyo'];
        }
        else
        {
            $estado = 'No contactado';
        }

        return new Persona([
            'cc' => $row['cedula'],
            'nombre' => $row['nombre'],
            'apellidos' => $row['apellidos'],
            'genero_id' => generos($genero),
            'fecha_nacimiento' => $fecha,
            'celular' => $row['celular'],
            'telefonos' => $row['telefonos'],
            'email' => $row['email'],
            'departamento_id' => departamentos($departamento),
            'municipio_id' => municipios($municipio),
            'comuna_id' => comunas($comuna, $departamento, $municipio),
            'direccion' => $row['direccion'],
            'ocupacion_id' => ocupacion($ocupacion),
            'nivel_academico_id' => nivelAcademico($nivel),
            'estado_apoyo_id' => estadoApoyo($estado),
            'observacion' => $row['obervacion'],
        ]);
    }
}
