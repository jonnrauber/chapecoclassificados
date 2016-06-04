<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
  //chave primária
  protected $primaryKey = ['emaili','id'];
  public $incrementing = false;

  protected $fillable = [
    'emaili',
    'id',
    'msg'
  ];
}
