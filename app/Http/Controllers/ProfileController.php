<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Auth;
use Validator;
use App\User;
use Session;
use Hash;

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
      'estado' => 'required',
      'cidade' => 'required'
    ];
    $validation = Validator::make($request->all(), $rules);

    if(!$validation->fails()) {
      $usuario = User::find(Auth::user()->email);
      $usuario->nome = $request->nome;
      $usuario->tel1 = $request->tel1;
      $usuario->tel2 = $request->tel2;
      $usuario->bairro = $request->bairro;
      $usuario->estado = $request->estado;
      $usuario->cidade = $request->cidade;
      $usuario->save();
    } else {
      return Redirect::back()->withErrors($validation);
    }
    return redirect('perfil');
  }

  public function paginaAlterarSenha() {
    return view('perfil/alterarsenha');
  }

  public function alterarSenha(Request $request) {
    $rules = [
      'senhaAntiga' => 'required',
      'novaSenha' => 'required|confirmed|min:6',
    ];
    $messages = [
      'senhaAntiga.required' => 'preencha sua senha antiga',
      'novaSenha.required' => 'preencha sua nova senha',
      'novaSenha.confirmed' => 'as senhas não coincidem',
      'novaSenha.min' => 'a nova senha deve conter no mínimo 6 caracteres'
    ];
    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails())
      return Redirect::back()->withErrors($validator);

    if(Hash::check($request->senhaAntiga, Auth::user()->password)) {
      $usuario = Auth::user();
      $usuario->password = bcrypt($request->novaSenha);
      $usuario->save();

      Session::flash('senha_sucesso', 'Sua senha foi alterada com sucesso.');
      return Redirect::back();
    } else {
      Session::flash('erro_senha', 'A senha antiga inserida está incorreta.');
      return Redirect::back();
    }
  }
}
