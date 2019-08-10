<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Sofa\Eloquence\Eloquence;

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
        'departamento_id',
        'municipio_id',
        'barrio_id',
        'direccion',
        'genero_id',
        'fecha_nacimiento',
        'ocupacion_id',
        'nivel_academico_id',
        'estado_apoyo_id',
        'observacion'
        ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        ];


    //use Eloquence;

    /*protected $searchableColumns = [
        'cc',
        'nombre',
        'apellidos',
        'celular',
        'telefonos',
        'comuna_id',
        'lider_id',
        'lugar_votacion_id',
        'departamento_id',
        'municipio_id',
        'barrio_id',
        'direccion',
        'genero_id',
        'fecha_nacimiento',
        'ocupacion_id',
        'nivel_academico_id',
        'estado_apoyo_id',
        'observacion'
        ];*/
}
