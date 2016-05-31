<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetPag extends Model
{
  //chave primária
  protected $primaryKey = ['emaila','tituloa','codp'];
  public $incrementing = false;

  protected $fillable = [
    'emaila',
    'tituloa',
    'codp'
  ];
}
