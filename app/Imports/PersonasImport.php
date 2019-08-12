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
        return new Persona([
            'cc' => $row['cedula'],
            'nombre' => $row['nombre'],
            'apellidos' => $row['apellidos'],
            'celular' => $row['celular'],
            'telefonos' => $row['telefonos'],
            'email' => $row['email'],
            'departamento_id' => departamentos($row['departamento']),
            'municipio_id' => municipios($row['municipio']),
            'comuna_id' => comunas($row['comuna'], $row['departamento'], $row['municipio']),
            'direccion' => $row['direccion'],
            'genero_id' => generos($row['genero']),
            'fecha_nacimiento' => Date::excelToDateTimeObject($row['fechanacimiento']),
            'ocupacion_id' => ocupacion($row['ocupacion']),
            'nivel_academico_id' => nivelAcademico($row['nivelacademico']),
            'estado_apoyo_id' => estadoApoyo($row['estadoapoyo']),
            'observacion' => $row['obervacion'],
        ]);
    }
}
