<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DenunciaRequest;
use App\DenunciaA;
use DB;

class DenunciaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function denunciaAnuncio(DenunciaRequest $request) {
    $denuncia = new DenunciaA;
    $denuncia->motivo = $request->motivo;
    $denuncia->id = $request->id;
    $denuncia->emaild = $request->emaild;

    $denuncia->save();
    return redirect('anuncio/'.$request->id);
  }

  public function showDenunciaPage($id) {
    $anuncio = DB::select('
      select a.*, u.* from anuncios a
      join usuarios u on a.emaila = u.email where
      a.id = ?', [$id]);
    $anuncio = $anuncio[0];
    return view('anuncio/denuncia', ['anuncio' => $anuncio]);
  }
}
