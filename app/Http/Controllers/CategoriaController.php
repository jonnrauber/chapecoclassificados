<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Anuncio;
use App\User;
use App\Categoria;
class CategoriaController extends Controller
{
  public function showAnunciosByCat($id){
    $anuncios = DB::select(
      'select a.*, u.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      join usuarios u on u.email = a.emaila
      where c.codc= ?', [$id]);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnunciosByUrl($palavra) {
    $anuncios = DB::select(
      "select a.*, u.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      join usuarios u on u.email = a.emaila
      where a.tituloa ~* ?", [$palavra]);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnunciosBySearch(Request $request) {
    $anuncios = DB::select(
      "select a.*, u.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      join usuarios u on u.email = a.emaila
      where a.tituloa ~* ?", [$request->titulo]);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnuncioPage($id){
    $anuncio = Anuncio::find($id);
    //tem que implementar a contagem de visitas!
    $vendedor = User::find($anuncio->emaila);
    $categoria = Categoria::find($anuncio->codc);
    return view('anuncio/publicacao', ['anuncio'=>$anuncio, 'vendedor'=>$vendedor, 'categoria'=>$categoria]);
  }
}
