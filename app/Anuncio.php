<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
  //chave primária
  protected $primaryKey = ['emaila','tituloa'];
  public $incrementing = false;

  protected $fillable = [
    'id',
    'emaila',
    'tituloa',
    'descricao',
    'codc',
    'valor',
    'qtvisit',
    'prior',
    'tipo',
    'qtitens',
    'condicao',
    'dataex',
  ];

}
