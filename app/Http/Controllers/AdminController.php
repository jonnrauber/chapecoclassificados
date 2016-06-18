<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use Validator;
use Redirect;
use DB;
use App\User;
use App\Anuncio;
use App\Categoria;
use App\Pagamento;

class AdminController extends Controller
{
    public function showRestritoPage() {
      session_start();
      if(isset($_SESSION['login']) && isset($_SESSION['senha']))
        return view('restrito.index');
      return view('restrito.login');
    }
    public function loginAdmin(Request $request) {
      $login = $request->loginadm;
      $senha = $request->senhaadm;

      $rules = [
        'loginadm' => 'required',
        'senhaadm' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);
      if($validator) {
        session_start();
        $adm = Admin::find($login);
        if($adm) {
          if($senha == $adm->senha) {
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            return view('restrito/index');
          }
          unset($_SESSION['login']);
	        unset($_SESSION['senha']);
        }
      }
      return back()
              ->withErrors('autherror')
              ->withInput($request->except('senhaadm'));
    }

    public function logoutAdmin() {
      session_start();
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      return redirect('restrito');
    }

    private function admIsLoggedIn(){
      session_start();
      if(!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        return false;
      }
      return true;
    }

    public function gerenciaUsuarios() {
        $usuarios = DB::select('select * from usuarios');
        if($this->admIsLoggedIn()) {
          return view('restrito.usuarios', ['usuarios' => $usuarios]);
        }
        else {
          return redirect('restrito');
        }
    }
    public function procuraUsuarios(Request $request) {
        $usuarios = DB::select('select * from usuarios where email = ?', [$request->emailpesquisa]);
        if($this->admIsLoggedIn() && $usuarios) {
          return view('restrito.usuarios', ['usuarios' => $usuarios]);
        }
        else {
          return redirect('restrito/usuarios');
        }
    }

    public function updateUsuario($email) {
      if(!$this->admIsLoggedIn()) return redirect('restrito');
      $usuario = User::find($email);
      if(!$usuario)
        return back();
      else {
        return view('restrito.usuarioupdate', ['usuario' => $usuario]);
      }
    }

    public function aplicaUpdateUsuario(Request $request) {
      if(!$this->admIsLoggedIn()) return redirect('restrito');
      $usuario = User::find($request->email);

      $validator = Validator::make($request->all(), [
        'nome' => 'required',
        'senha' => 'required|min:6|confirmed',
        'tel1' => 'required|min:10|numeric',
        'pais' => 'required',
        'estado' => 'required',
        'cidade' => 'required',
        'bairro' => 'required'
      ]);

      if(!$usuario || !$validator)
        return back();
      else {
        $usuario->email = $request->email;
        $usuario->nome = $request->nome;
        $usuario->senha = bcrypt($request->senha);
        $usuario->tel1 = $request->tel1;
        $usuario->tel2 = $request->tel2;
        $usuario->bairro = $request->bairro;
        $usuario->cidade = $request->cidade;
        $usuario->estado = $request->estado;
        $usuario->pais = $request->pais;

        $usuario->save();
        return view('restrito.usuarioupdate', ['usuario' => $usuario]);
      }
    }

    public function deletaUsuario($email) {
      if(!$this->admIsLoggedIn()) return redirect('restrito');
      $usuario = User::find($email);
      $usuario->delete();
      return redirect('restrito/usuarios');
    }

    public function criaUsuario() {
      return redirect('register');
    }

    public function deletaAnuncio($id) {
      if(!$this->admIsLoggedIn()) return redirect('restrito');
      $anuncio = Anuncio::find($id);
      $anuncio->delete();
      return redirect('restrito/anuncios');
    }


    public function gerenciaAnuncios() {
      $anuncios = DB::select('
        select a.*, u.nome, u.email from anuncios a
        join usuarios u on a.emaila = u.email
        order by a.id');
      if($this->admIsLoggedIn()) {
        return view('restrito.anuncios', ['anuncios' => $anuncios]);
      }
      else {
        return redirect('restrito');
      }
    }
    public function visualizarDetalhes($id) {
      $anuncio = Anuncio::find($id);
    }

    public function procuraAnuncios(Request $request) {
      $anuncios = DB::select(
        'select * from anuncios a
        join usuarios u on a.emaila = u.email
        where email = ?', [$request->email]);
      if($this->admIsLoggedIn() && $anuncios) {
        return view('restrito.anuncios', ['anuncios' => $anuncios]);
      }
      else {
        return redirect('restrito/anuncios');
      }
    }

    public function gerenciaDenuncias() {
        $denuncias = DB::select('
          select d.*, a.emaila from denuncia_a d
          join anuncios a on d.id = a.id');
        if($this->admIsLoggedIn()) {
          return view('restrito.denuncias', ['denuncias' => $denuncias]);
        }
        else {
          return redirect('restrito');
        }
    }

    public function addCategoria(Request $request) {
      $cat = new Categoria;
      $cat->nomec = $request->nomec;
      $cat->codc = $request->codc;
      $cat->foto = $request->foto;

      $cat->save();
      return back();
    }

    public function addPagamento(Request $request) {
      $pag = new Pagamento;
      $pag->nomep = $request->nomep;
      $pag->codp = $request->codp;

      $pag->save();
      return back();
    }
}
