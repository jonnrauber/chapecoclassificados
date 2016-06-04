<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DenunciaA extends Model
{
    protected $table = 'denuncia_a';
    public $incrementing = false;
    //chave primária
    protected $primaryKey = ['emaild','id'];

    protected $fillable = [
      'emaild',
      'id',
      'motivo',
    ];
}
