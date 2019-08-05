<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'cc',
        'nombre',
        'apellidos',
        'celular',
        'telefonos',
        'comuna_id',
        'lider_id',
        'lugar_votacion_id',
        'documento_id',
        'municipio_id',
        'barrio_id',
        'direccion',
        'genero_id',
        'ocupacion_id',
        'nivel_academico_id',
        'estado_apoyo_id',
        'observacion'
        ];
        
    protected $casts = [
        'fecha_nacimiento' => 'date',
        ];
}
