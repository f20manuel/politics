<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Lider extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'cc',
        'nombre',
        'apellidos',
        'celular',
        'telefonos',
        'email',
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
}
