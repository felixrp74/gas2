<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->nullable();
            $table->string('name'); 
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('usuario')->nullable();
            $table->string('tipo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
 
            $table->string('tipo_usuario')->nullable(); //
            $table->integer('identificador_secretaria')->nullable(); // por id de la tabla secretaria
            $table->integer('identificador_supervisor_logistica')->nullable(); // por id de la tabla supervisor_logistica
            $table->integer('identificador_gerente')->nullable(); // por id de la tabla gerente
            $table->integer('identificador_contador')->nullable(); // por id de la tabla contador
            $table->integer('identificador_chofer_moto')->nullable(); // por id de la tabla chofer_moto
            $table->integer('identificador_chofer_trailer')->nullable(); // por id de la tabla chofer_trailer

            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
