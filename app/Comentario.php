<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
  //chave primária
  protected $primaryKey = ['emaila','tituloa','emailc','created_at'];
  public $incrementing = false;

  protected $fillable = [
    'emaila',
    'emailc',
    'tituloa',
    'tituloc',
    'msg'
  ];
}
