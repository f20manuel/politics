<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $fillable = [
        'name',
        'departamento_id',
        'municipio_id'
        ];
}
