<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetPagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('met_pags', function (Blueprint $table) {
          $table->string('emaila',50);
          $table->string('tituloa',100);
          $table->string('codp', 3);

          $table->timestamps();

          $table->primary(['emaila','tituloa','codp']);
          $table->foreign('codp')->references('codp')->on('pagamentos');
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
        Schema::drop('met_pags');
    }
}
