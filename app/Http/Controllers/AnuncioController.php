<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use Auth;

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
    $interesses = DB::table('interesses')->where('emaili', Auth::user()->email)->get();
    return view('anuncio.interesses', array('interesses'=>$interesses));
  }
  public function showMeusItensPage(){
    $anuncios = DB::table('anuncios')->where('emaila', Auth::user()->email)->get();
    return view('anuncio.meusitens', ['anuncios'=>$anuncios]);
  }

  public function createAnuncio(Request $request){
    $validator = Validator::make($request->all(), [
      'tipo' => 'required',
      'codc' => 'required',
      'tituloa' => 'required|max:100',
      'descricao' => 'required',
      'valor' => 'numeric',
      'qtitens' => 'integer'
    ]);

    if($validator->fails()) {
      return redirect('anuncio/novo')->withErrors($validator);
    }


  }
}
