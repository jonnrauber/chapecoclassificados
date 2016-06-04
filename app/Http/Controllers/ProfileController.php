<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Auth;
use Validator;

class ProfileController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function perfil()
  {
      return view('perfil');
  }

  public function uploadFotoPerfil(Request $request) {
    $rules = ['fotoperfil' => 'required|mimes:jpg,jpeg,png,bmp'];
    $validation = Validator::make($request->all(), $rules);
    if (!$validation->fails()) {
      $nomeTemporario = $request->file('fotoperfil')->getPathname();
      $nome = $request->file('fotoperfil')->getClientOriginalName();
      $destino = base_path() . '/public/img/perfil/';
      $request->file('fotoperfil')->move($destino, Auth::user()->email);
    } else {
      return Redirect::back()->withErrors($validation);
    }
    return Redirect::back();
  }
}
