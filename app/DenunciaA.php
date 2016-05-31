<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DenunciaA extends Model
{
    protected $table = 'denuncia_a';
    public $incrementing = false;
    //chave primária
    protected $primaryKey = ['emaild','emaila','tituloa'];

    protected $fillable = [
      'emaild',
      'emaila',
      'tituloa',
      'motivo',
    ];
}
