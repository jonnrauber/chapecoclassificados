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
          $table->integer('id');
          $table->string('emailc',50);
          $table->string('tituloc',50);
          $table->string('msg',255);

          $table->primary(['emailc','created_at','id']);
          $table->foreign('emailc')->references('email')->on('usuarios');
          $table->foreign('id')->references('id')->on('anuncios');
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
