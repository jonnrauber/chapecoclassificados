<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('usuarios', function (Blueprint $table) {
      $table->string('email', 50);
      $table->string('nome', 50);
      $table->string('senha', 70);
      $table->rememberToken();
      $table->string('tel1', 15);
      $table->string('tel2', 15)->nullable();

      //data de cadastro
      $table->timestamps();

      //endereço
      $table->string('bairro', 30);
      $table->string('cidade', 30);
      $table->string('estado', 2);
      $table->string('pais', 3);

      //primary key
      $table->primary('email');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('users');
  }
}
