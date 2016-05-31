<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
  //chave primária
  protected $primaryKey = 'codp';
  public $incrementing = false;

  protected $fillable = [
    'codp',
    'nomep'
  ];
}
