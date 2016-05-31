<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DenunciaC extends Model
{
  protected $table = 'denuncia_c';
  //chave primária
  protected $primaryKey = ['emaild','emaila','tituloa','datac','emailc'];
  public $incrementing = false;

  protected $fillable = [
    'emaild',
    'emaila',
    'tituloa',
    'datac',
    'emailc',
    'motivo'
  ];
}
