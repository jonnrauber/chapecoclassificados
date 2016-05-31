<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
  //chave primária
  protected $primaryKey = 'login';
  public $incrementing = false;

  protected $fillable = [
    'login',
    'senha',
  ];
  protected $hidden = [
    'senha',
  ];
}
