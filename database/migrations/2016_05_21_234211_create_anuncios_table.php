<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
          $table->timestamps();

          $table->string('emaila', 50);
          $table->string('tituloa', 100);
          $table->string('codc', 3);
          $table->decimal('valor', 8, 2)->nullable;
          $table->integer('qtvisit');
          $table->boolean('prior');
          $table->char('tipo');
          $table->integer('qtitens')->nullable();
          $table->char('condicao')->nullable();
          $table->timestamp('dataex');

          $table->primary(['emaila','tituloa']);
          $table->foreign('emaila')->references('email')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('anuncios');
    }
}
