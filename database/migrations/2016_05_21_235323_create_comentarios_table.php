<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
          $table->timestamps();
          $table->string('emaila',50);
          $table->string('emailc',50);
          $table->string('tituloa',50);
          $table->string('tituloc',50);
          $table->string('msg',255);

          $table->primary(['emaila','emailc','tituloa','created_at']);
          $table->foreign('emailc')->references('email')->on('usuarios');
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
        Schema::drop('comentarios');
    }
}
