<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ComentarioRequest;
use App\Comentario;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function enviarComentario(ComentarioRequest $request) {
      $comentario = new Comentario;
      $comentario->emailc = $request->emailc;
      $comentario->id = $request->id;
      $comentario->msg = $request->msg;

      $comentario->save();

      return back();
    }
}
