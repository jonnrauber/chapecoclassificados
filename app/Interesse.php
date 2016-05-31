<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
  //chave primária
  protected $primaryKey = ['emaili','emaila','tituloa'];
  public $incrementing = false;

  protected $fillable = [
    'emaili',
    'emaila',
    'tituloa',
    'msg'
  ];
}
