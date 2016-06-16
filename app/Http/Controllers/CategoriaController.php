<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Anuncio;
use App\User;
use App\Categoria;
use App\Pagamento;
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

  public function showAnunciosByLocation(Request $request){
    $query = "select a.*, u.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      join usuarios u on u.email = a.emaila";
    if($request->estado || $request->cidade) {
      $query = $query." where";
      if($request->estado) $query = $query." u.estado = '$request->estado'";
      if($request->cidade) $query = $query." and u.cidade = '$request->cidade'";
    }
    $anuncios = DB::select($query);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnunciosByPrice(Request $request) {
    $min = $request->minimo ? $request->minimo : 0;
    $max = $request->maximo ? $request->maximo : 999999999;
    $query = "select a.*, u.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      join usuarios u on u.email = a.emaila
      where a.valor between ".$min." and ".$max;
    $anuncios = DB::select($query);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnuncioPage($id){
    $anuncio = Anuncio::find($id);
    //tem que implementar a contagem de visitas!
    $vendedor = User::find($anuncio->emaila);
    $categoria = Categoria::find($anuncio->codc);
    $comentarios = DB::select('
      select c.*, u.nome from comentarios c
      join anuncios a on c.id = a.id
      join usuarios u on a.emaila = u.email');
    $pagamento = Pagamento::find($anuncio->codp);
    return view('anuncio/publicacao', [
      'anuncio' => $anuncio,
      'vendedor'=>$vendedor,
      'categoria'=>$categoria,
      'comentarios' => $comentarios,
      'pagamento' => $pagamento
    ]);
  }

  public function showCategoriasPage() {
    $categorias = DB::select('select c.* from categorias c');
    return view('anuncio.categoria', ['categorias' => $categorias]);
  }
}
