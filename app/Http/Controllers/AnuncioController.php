<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AnuncioRequest;
use Validator;
use DB;
use Auth;
use App\Anuncio;
use App\User;
use App\Categoria;


class AnuncioController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

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

  public function showAnuncioForm(){
    return view('anuncio.novo');
  }
  public function showMeusItensPage(){
    $anuncios = DB::select('select a.* from anuncios a where a.emaila = ?', [Auth::user()->email]);
    return view('anuncio.meusitens', ['anuncios'=>$anuncios]);
  }
  public function showAnuncioPage($id){
    $anuncio = Anuncio::find($id);
    //tem que implementar a contagem de visitas!
    $vendedor = User::find($anuncio->emaila);
    $categoria = Categoria::find($anuncio->codc);
    return view('anuncio/publicacao', ['anuncio'=>$anuncio, 'vendedor'=>$vendedor, 'categoria'=>$categoria]);
  }
  public function salvaImagemAnuncio($request, $campo, $num){
    if($request->hasFile($campo)) {
      $string = $request->file($campo)->getPathname();
      $nomeTemporario = substr($string, 8, strlen($string));
      $nome = $request->file($campo)->getClientOriginalName();
      $destino = base_path() . '/public/img/anuncio/';
      $nomearquivo = $nomeTemporario.Auth::user()->email.'_'.$num;
      $request->file($campo)->move($destino, $nomearquivo);
      return $nomearquivo;
    }
    return false;
  }

  public function createAnuncio(AnuncioRequest $request){
    $anuncio = new Anuncio;
    $anuncio->emaila = Auth::user()->email;
    $anuncio->tituloa = $request->tituloa;
    $anuncio->descricao = $request->descricao;
    $anuncio->codc = $request->codc;
    $anuncio->valor = $request->valor;
    $anuncio->qtvisit = 0;
    $anuncio->prior = false; //falta colocar a prioridade!
    $anuncio->tipo = $request->tipo;
    $anuncio->qtitens = $request->qtitens ? $request->qtitens : null;
    $anuncio->condicao = $request->condicao;
    $anuncio->dataex = date('Y-m-d H:i:s', strtotime("+1 month"));

    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem1', 1);
    if($nomearquivo) $anuncio->imagem1 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem2', 2);
    if($nomearquivo) $anuncio->imagem2 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem3', 3);
    if($nomearquivo) $anuncio->imagem3 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem4', 4);
    if($nomearquivo) $anuncio->imagem4 = $nomearquivo;
    $nomearquivo = $this->salvaImagemAnuncio($request, 'imagem5', 5);
    if($nomearquivo) $anuncio->imagem5 = $nomearquivo;

    $anuncio->save();

    return view('anuncio/novosuccess');
  }

}
