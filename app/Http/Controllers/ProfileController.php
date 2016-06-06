<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Auth;
use Validator;
use App\User;

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
      return view('perfil/perfil');
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
  public function showEditarPerfilPage() {
    return view('perfil/editar');
  }
  public function editarPerfil(Request $request) {
    $rules = [
      'nome' => 'required',
      'tel1' => 'required|min:10|numeric',
      'bairro' => 'required',
      'cidade' => 'required'
    ];
    $validation = Validator::make($request->all(), $rules);

    if(!$validation->fails()) {
      $usuario = User::find(Auth::user()->email);
      $usuario->nome = $request->nome;
      $usuario->tel1 = $request->tel1;
      $usuario->tel2 = $request->tel2;
      $usuario->bairro = $request->bairro;
      $usuario->cidade = $request->cidade;
      $usuario->save();
    } else {
      return Redirect::back()->withErrors($validation);
    }
    return redirect('perfil');
  }
}
