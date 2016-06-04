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

          $table->increments('id');
          $table->string('emaila', 50);
          $table->string('tituloa', 100);
          $table->string('descricao', 255);
          $table->string('codc', 3);
          $table->decimal('valor', 8, 2)->nullable();
          $table->integer('qtvisit')->default(0);
          $table->boolean('prior')->default(false);
          $table->string('tipo',1);
          $table->integer('qtitens')->nullable();
          $table->string('condicao',1)->nullable();
          $table->timestamp('dataex');
          $table->string('imagem1', 100)->nullable();
          $table->string('imagem2', 100)->nullable();
          $table->string('imagem3', 100)->nullable();
          $table->string('imagem4', 100)->nullable();
          $table->string('imagem5', 100)->nullable();

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
