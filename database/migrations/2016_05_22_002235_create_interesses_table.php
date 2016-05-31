<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesses', function (Blueprint $table) {
          $table->string('emaili',50);
          $table->string('emaila',50);
          $table->string('tituloa',100);
          $table->string('msg',255);

          $table->timestamps();

          $table->primary(['emaili','emaila','tituloa']);
          $table->foreign('emaili')->references('email')->on('usuarios');
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
        Schema::drop('interesses');
    }
}
