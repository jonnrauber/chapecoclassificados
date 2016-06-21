<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InteresseRequest;
use App\Http\Requests;
use App\Interesse;
use Auth;
use App\Anuncio;
use Mail;
use Redirect;
use DB;
use Validator;

class InteresseController extends Controller
{
  public function __construct() {
      $this->middleware('auth');
  }

  private function enviarEmailInteresse($interesse) {
    $usuario = DB::select('
      select u.*, a.tituloa from usuarios u
      join anuncios a on u.email = a.emaila
      where a.id = ?', [$interesse->id]);
    Mail::send('auth.emails.interesse', ['interesse' => $interesse, 'usuario' => $usuario[0]], function ($message) use ($usuario) {
      $message->to($usuario[0]->email)->subject('Novo interesse - Classificados Chapecó');
    });
  }

  public function enviarInteresse(InteresseRequest $request) {
    $interesse = new Interesse;
    $interesse->msg = $request->msg;
    $interesse->emaili = $request->emaili;
    $interesse->id = $request->id;

    $interesse->save();

    $this->enviarEmailInteresse($interesse);

    return Redirect::back();
  }

  public function showInteressesPage(){
    $interesses = DB::select(
      'select i.*, a.tituloa, a.emaila, u.nome from interesses i
      join anuncios a on i.id = a.id
      join usuarios u on a.emaila = u.email
      where i.emaili = ?
      order by i.created_at desc', [Auth::user()->email]);
    return view('anuncio.interesses', ['interesses'=>$interesses]);
  }

  public function showInteressesRecebidosPage(){
    $interesses = DB::select(
      'select i.*, a.tituloa, a.emaila, u.nome from interesses i
      join anuncios a on i.id = a.id
      join usuarios u on i.emaili = u.email
      where a.emaila = ?
      order by i.created_at desc', [Auth::user()->email]);
    return view('anuncio.interessesrecebidos', ['interesses'=>$interesses]);
  }
}
