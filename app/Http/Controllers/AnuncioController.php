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

class AnuncioController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function showAnuncioForm(){
    return view('anuncio.novo');
  }
  public function showInteressesPage(){
    $interesses = DB::select('select i.* from interesses i where i.emaili = ?', [Auth::user()->email]);
    return view('anuncio.interesses', ['interesses'=>$interesses]);
  }
  public function showMeusItensPage(){
    $anuncios = DB::select('select a.* from anuncios a where a.emaila = ?', [Auth::user()->email]);
    return view('anuncio.meusitens', ['anuncios'=>$anuncios]);
  }
  public function showAnuncioPage($id){
    $anuncio = new Anuncio;
    $anuncio = Anuncio::where('id', $id)->first();

    //tem que implementar a contagem de visitas!

    $vendedor = User::find($anuncio->emaila);

    return view('anuncio/publicacao', ['anuncio'=>$anuncio, 'vendedor'=>$vendedor]);
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
    $anuncio->qtitens = $request->qtitens ? $request->qtitens : 0;
    $anuncio->condicao = $request->condicao;
    $anuncio->dataex = date('Y-m-d H:i:s', strtotime("+1 month"));

    $qtanuncios = DB::select('select count(*) from anuncios');
    $anuncio->id = $qtanuncios[0]->count + 1;

    $anuncio->save();

    return view('anuncio/novosuccess');
  }

}
