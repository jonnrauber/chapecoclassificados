<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  //chave primária
  protected $primaryKey = 'codc';
  public $incrementing = false;

  protected $fillable = [
    'codc',
    'nomec'
  ];
}
