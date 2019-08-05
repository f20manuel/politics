<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Persona;
use Faker\Generator as Faker;

$factory->define(Persona::class, function (Faker $faker) {
    return [
        'cc' => $faker->unique()->ean8,
        'nombre' => $faker->firstName . ' ' . $faker->firstName,
        'apellidos' => $faker->lastName . ' ' . $faker->lastName,
        'celular' => $faker->unique()->tollFreePhoneNumber,
        'telefonos' => $faker->unique()->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'departamento_id' => 29,
        'municipio_id' => $faker->numberBetween($min = 1, $max = 25),
        'direccion' => $faker->address,
        'genero_id' => $faker->numberBetween($min = 1, $max = 3),
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 2001),
        'ocupacion_id' => $faker->numberBetween($min = 1, $max = 3),
        'nivel_academico_id' => $faker->numberBetween($min = 1, $max = 3),
        'estado_apoyo_id' => $faker->numberBetween($min = 1, $max = 3),
        'observacion' => $faker->text($maxNbChars = 200),
        'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
        'updated_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now'),
    ];
});
