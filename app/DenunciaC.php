<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DenunciaC extends Model
{
  protected $table = 'denuncia_c';
  //chave primária
  protected $primaryKey = ['emaild','id','datac','emailc'];
  public $incrementing = false;

  protected $fillable = [
    'emaild',
    'id',
    'datac',
    'emailc',
    'motivo'
  ];
}
