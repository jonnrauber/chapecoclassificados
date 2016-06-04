<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetPag extends Model
{
  //chave primária
  protected $primaryKey = ['id','codp'];
  public $incrementing = false;

  protected $fillable = [
    'id',
    'codp'
  ];
}
