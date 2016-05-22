<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciaAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncia_a', function (Blueprint $table) {
          $table->string('emaild',50);
          $table->string('emaila',50);
          $table->string('tituloa',100);
          $table->string('motivo',255);

          $table->timestamps();

          $table->primary(['emaild','emaila','tituloa']);
          $table->foreign('emaild')->references('email')->on('usuarios');
          $table->foreign(['emaila','tituloa'])->references(['emaila','tituloa'])->on('anuncios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('denuncia_a');
    }
}
