<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InteresseRequest;
use App\Http\Requests;
use App\Interesse;
use Auth;
use Redirect;
use DB;

class InteresseController extends Controller
{
  public function enviarInteresse($id, InteresseRequest $request) {
    $interesse = new Interesse;
    $interesse->msg = $request->msg;
    $interesse->emaili = Auth::user()->email;
    $interesse->id = $id;

    $interesse->save();

    return Redirect::back();
  }

  public function showInteressesPage(){
    $interesses = DB::select(
      'select * from interesses i
      join anuncios a on i.id = a.id
      join usuarios u on a.emaila = u.email
      where i.emaili = ?', [Auth::user()->email]);
    return view('anuncio.interesses', ['interesses'=>$interesses]);
  }

  public function showInteressesRecebidosPage(){
    $interesses = DB::select(
      'select * from interesses i
      join anuncios a on i.id = a.id
      join usuarios u on i.emaili = u.email
      where a.emaila = ?', [Auth::user()->email]);
    return view('anuncio.interessesrecebidos', ['interesses'=>$interesses]);
  }
}
