<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
  //chave primária
  protected $primaryKey = ['id','emailc','created_at'];
  public $incrementing = false;

  protected $fillable = [
    'emailc',
    'id',
    'tituloc',
    'msg'
  ];
}
