<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cc')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('celular')->unique();
            $table->integer('telefonos')->unique();
            $table->string('email')->unique()->nullable();
            $table->unsignedBigInteger('comuna_id');
            $table->unsignedBigInteger('lugar_votacion_id');
           
           //Información de Recidencia
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('barrio_id');
            $table->longText('direccion');
            
            //Información personal
            $table->unsignedBigInteger('genero_id');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('ocupacion_id');
            $table->unsignedBigInteger('nivel_academico_id');
            $table->unsignedBigInteger('estado_apoyo_id');
            $table->longText('observacion');
            
            $table->timestamps();
            
            //Claves foraneas
            $table->foreign('comuna_id')->references('id')->on('comunas')->onDelete('cascade');
            $table->foreign('lugar_votacion_id')->references('id')->on('l_votacions')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->foreign('barrio_id')->references('id')->on('barrios')->onDelete('cascade');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions')->onDelete('cascade');
            $table->foreign('nivel_academico_id')->references('id')->on('nivel_academicos')->onDelete('cascade');
            $table->foreign('estado_apoyo_id')->references('id')->on('estado_apoyos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('liders', function (Blueprint $table) {
           $table->dropForeign('liders_comuna_id_foreign');
           $table->dropForeign('liders_lugar_votacion_id_foreign');
           $table->dropForeign('liders_departamento_id_foreign');
           $table->dropForeign('liders_municipio_id_foreign');
           $table->dropForeign('liders_barrio_id_foreign');
           $table->dropForeign('liders_genero_id_foreign');
           $table->dropForeign('liders_ocupacion_id_foreign');
           $table->dropForeign('liders_nivel_academico_id_foreign');
           $table->dropForeign('liders_estado_apoyo_id_foreign');
           $table->dropColumn('comuna_id');
           $table->dropColumn('lugar_votacion_id');
           $table->dropColumn('departamento_id');
           $table->dropColumn('municipio_id');
           $table->dropColumn('barrio_id');
           $table->dropColumn('genero_id');
           $table->dropColumn('ocupacion_id');
           $table->dropColumn('nivel_academico_id');
           $table->dropColumn('estado_apoyo_id');
        });
        Schema::dropIfExists('liders');
    }
}
