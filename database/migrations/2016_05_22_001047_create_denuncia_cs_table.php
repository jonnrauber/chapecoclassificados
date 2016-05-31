<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciaCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncia_c', function (Blueprint $table) {
          $table->string('emaild',50);
          $table->string('emaila',50);
          $table->string('tituloa',100);
          $table->timestamp('datac');
          $table->string('emailc',50);
          $table->string('motivo',255);

          $table->timestamps();

          $table->primary(['emaild','emaila','tituloa','datac','emailc']);
          $table->foreign('emaild')->references('email')->on('usuarios');
          $table->foreign(['emaila','tituloa','datac','emailc'])->references(['emaila','tituloa','created_at','emailc'])->on('comentarios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('denuncia_c');
    }
}
