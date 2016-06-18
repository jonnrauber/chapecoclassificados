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
  public function showAnunciosByCat($codc){
    $anuncios = DB::table('anuncios')
                    ->join('categorias', 'anuncios.codc', '=', 'categorias.codc')
                    ->join('usuarios', 'anuncios.emaila', '=', 'usuarios.email')
                    ->select('anuncios.*', 'usuarios.*', 'categorias.nomec')
                    ->where('anuncios.codc', '=', $codc)
                    ->paginate(10);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }
  public function showAnunciosDestaques() {
    $anuncios = DB::table('anuncios')
                    ->join('categorias', 'anuncios.codc', '=', 'categorias.codc')
                    ->join('usuarios', 'anuncios.emaila', '=', 'usuarios.email')
                    ->select('anuncios.*', 'usuarios.*', 'categorias.nomec')
                    ->where('anuncios.prior', '=', 'true')
                    ->paginate(10);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnunciosRecentes() {
    $anuncios = DB::table('anuncios')
                    ->join('categorias', 'anuncios.codc', '=', 'categorias.codc')
                    ->join('usuarios', 'anuncios.emaila', '=', 'usuarios.email')
                    ->select('anuncios.*', 'usuarios.*', 'categorias.nomec')
                    ->orderBy('anuncios.created_at', 'desc')
                    ->paginate(10);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnunciosByUrl($palavra) {
    $anuncios = DB::table('anuncios')
                    ->join('categorias', 'anuncios.codc', '=', 'categorias.codc')
                    ->join('usuarios', 'anuncios.emaila', '=', 'usuarios.email')
                    ->select('anuncios.*', 'usuarios.*', 'categorias.nomec')
                    ->where('anuncios.tituloa', '~*', $palavra)
                    ->paginate(10);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios]);
  }

  public function showAnunciosBySearch(Request $request) {
    $palavra = $request->titulo;
    $min = $request->minimo ? $request->minimo : 0;
    $max = $request->maximo ? $request->maximo : 9999999999;
    $estado = $request->estado;
    $cidade = $request->cidade;
    $cat = $request->cat;
    $filtrosAtivos = array();

    $anuncios = DB::table('anuncios')
                    ->join('categorias', 'anuncios.codc', '=', 'categorias.codc')
                    ->join('usuarios', 'anuncios.emaila', '=', 'usuarios.email')
                    ->select('anuncios.*', 'usuarios.*', 'categorias.nomec')
                    ->whereBetween('anuncios.valor', [$min, $max]); 
    if($palavra)
      $anuncios = $anuncios->where('anuncios.tituloa', '~*', $palavra);
    if($estado) {
      $anuncios = $anuncios->where('usuarios.estado', '=', $estado);
      array_push($filtrosAtivos, 'estado: '.$estado);
    }
    if($cidade) {
      $anuncios = $anuncios->where('usuarios.cidade', '=', $cidade);
      array_push($filtrosAtivos, 'cidade: '.$cidade);
    }
    if($cat) {
      $anuncios = $anuncios->where('anuncios.codc', '=', $cat);
      array_push($filtrosAtivos, 'categoria: '.$cat);
    }
    $anuncios = $anuncios->paginate(10);
    return view('anuncio.porcategoria', ['anuncios' => $anuncios, 'filtros' => $filtrosAtivos]);
  }

  public function showAnuncioPage($id){
    $anuncio = Anuncio::find($id);
    $anuncio->qtvisit++;
    $anuncio->save();
    //tem que implementar a contagem de visitas!
    $vendedor = User::find($anuncio->emaila);
    $categoria = Categoria::find($anuncio->codc);
    $comentarios = DB::select('
      select c.*, u.nome from comentarios c
      join anuncios a on c.id = a.id
      join usuarios u on a.emaila = u.email
      where a.id = ?
      order by c.created_at desc',[$id]);
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
