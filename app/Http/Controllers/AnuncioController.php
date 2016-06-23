<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AnuncioRequest;
use Validator;
use DB;
use Auth;
use App\Anuncio;
use App\BoletoBB;
use App\User;
use App\Categoria;
use Boleto;
use File;
use Session;

class AnuncioController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function showAnuncioForm(){
    return view('anuncio.novo');
  }
  public function showMeusItensPage(){
    $anuncios = DB::select('
      select a.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      where a.emaila = ?
      order by a.created_at desc', [Auth::user()->email]);
    return view('anuncio.meusitens', ['anuncios' => $anuncios]);
  }

  public function showEditarItemPage($id) {
    $anuncio = Anuncio::find($id);
    $categorias = DB::table('categorias')
                      ->orderBy('nomec')
                      ->get();
    $pagamentos = DB::table('pagamentos')
                      ->orderBy('nomep')
                      ->get();
    return view('anuncio.editar', ['anuncio' => $anuncio, 'categorias' => $categorias, 'pagamentos' => $pagamentos]);
  }

  public function editarAnuncio($id, AnuncioRequest $request) {
    $anuncio = Anuncio::find($id);

    $anuncio->emaila = Auth::user()->email;
    $anuncio->tituloa = $request->tituloa;
    $anuncio->descricao = $request->descricao;
    $anuncio->codc = $request->codc;
    $anuncio->codp = $request->codp ? $request->codp : 1;
    $anuncio->valor = $request->valor ? str_replace(',' , '' , $request->valor) : 0;
    $anuncio->prior = $request->prior ? true : false;
    $anuncio->tipo = $request->tipo;
    $anuncio->qtitens = $request->qtitens ? $request->qtitens : null;
    $anuncio->condicao = $request->condicao;

    $anuncio->save();

    Session::flash('edit_sucesso', 'Anúncio editado com sucesso.');
    return redirect('anuncio/'.$id);
  }

  public function deletaAnuncio($id) {
    $anuncio = Anuncio::find($id);

    if($anuncio->imagem1)
      File::delete('img/anuncio/'.$anuncio->imagem1);
    if($anuncio->imagem2)
      File::delete('img/anuncio/'.$anuncio->imagem2);
    if($anuncio->imagem3)
      File::delete('img/anuncio/'.$anuncio->imagem3);
    if($anuncio->imagem4)
      File::delete('img/anuncio/'.$anuncio->imagem4);
    if($anuncio->imagem5)
      File::delete('img/anuncio/'.$anuncio->imagem5);

    $anuncio->delete();

    return redirect('anuncio/meusitens');
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

  public function geraBoletoPdf(Request $request) {
    $cliente = User::find($request->emaila);
    $bb = new BoletoBB;
    $boleto = $bb->init($cliente);
    $bb->pdf($boleto);
  }

  public function createAnuncio(AnuncioRequest $request){
    $anuncio = new Anuncio;
    $anuncio->emaila = $request->emaila;
    $anuncio->tituloa = $request->tituloa;
    $anuncio->descricao = $request->descricao;
    $anuncio->codc = $request->codc;
    $anuncio->codp = $request->codp ? $request->codp : 1;
    $anuncio->valor = $request->valor ? str_replace(',' , '' , $request->valor) : 0;
    $anuncio->qtvisit = 0;
    $anuncio->prior = $request->prior ? true : false;
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
    return view('anuncio.novosuccess', ['boleto' => $request->prior]);
  }

}
