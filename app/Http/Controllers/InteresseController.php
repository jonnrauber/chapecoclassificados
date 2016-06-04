<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InteresseRequest;
use App\Http\Requests;
use App\Interesse;
use Auth;
use Redirect;

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
}
