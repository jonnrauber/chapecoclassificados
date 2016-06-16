<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	//nome da tabela
	protected $table = 'usuarios';
  //chave primária
	protected $primaryKey = 'email';
  public $incrementing = false;

	protected $fillable = [
		'email',
		'nome',
		'password',
		'tel1',
		'tel2',
		'bairro',
		'cidade',
		'estado',
		'pais'
	];

	protected $hidden = [
		'password', 'remember_token',
	];
}
