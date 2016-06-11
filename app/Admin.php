<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
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
