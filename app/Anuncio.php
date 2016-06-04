<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
  //chave primária

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
    'imagem1',
    'imagem2',
    'imagem3',
    'imagem4',
    'imagem5'
  ];

}
