<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cc')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('celular')->unique();
            $table->string('telefonos')->unique();
            $table->string('email')->unique()->nullable();
            $table->unsignedBigInteger('comuna_id')->nullable();
            $table->unsignedBigInteger('lider_id')->nullable();
            $table->unsignedBigInteger('lugar_votacion_id')->nullable();
           
           //Información de Recidencia
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('barrio_id')->nullable();
            $table->longText('direccion')->nullable();
            
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
            $table->foreign('lider_id')->references('id')->on('liders')->onDelete('cascade');
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
        Schema::table('personas', function (Blueprint $table) {
           $table->dropForeign('personas_comuna_id_foreign');
           $table->dropForeign('personas_lider_id_foreign');
           $table->dropForeign('personas_lugar_votacion_id_foreign');
           $table->dropForeign('personas_departamento_id_foreign');
           $table->dropForeign('personas_municipio_id_foreign');
           $table->dropForeign('personas_barrio_id_foreign');
           $table->dropForeign('personas_genero_id_foreign');
           $table->dropForeign('personas_ocupacion_id_foreign');
           $table->dropForeign('personas_nivel_academico_id_foreign');
           $table->dropForeign('personas_estado_apoyo_id_foreign');
           $table->dropColumn('comuna_id');
           $table->dropColumn('lider_id');
           $table->dropColumn('lugar_votacion_id');
           $table->dropColumn('departamento_id');
           $table->dropColumn('municipio_id');
           $table->dropColumn('barrio_id');
           $table->dropColumn('genero_id');
           $table->dropColumn('ocupacion_id');
           $table->dropColumn('nivel_academico_id');
           $table->dropColumn('estado_apoyo_id');
        });
        Schema::dropIfExists('personas');
    }
}