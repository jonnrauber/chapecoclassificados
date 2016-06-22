<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;
use Mail;
use Session;

class HomeController extends Controller
{
    public function index()
    {
      $anuncios = DB::select('select * from anuncios order by qtvisit desc');
      $recentes = DB::select('select * from anuncios order by created_at DESC');
      return view('welcome', ['recentes' => $recentes, 'anuncios' => $anuncios]);
    }

    public function paginaDeAjuda() {
      return view('ajuda');
    }

    public function enviarContatoAjuda (Request $request) {
      $rules = [
        'nome' => 'required',
        'email' => 'required',
        'msg' => 'required'
      ];
      $messages = [
        'nome.required' => 'Preencha o campo Nome',
        'email.required' => 'Preencha o campo E-mail',
        'msg.required' => 'Preencha o campo Mensagem'
      ];
      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails())
        return Redirect::back()->withErrors($validator);

      Mail::send('auth.emails.contatoajuda', ['pessoa' => $request], function ($message) use ($request) {
        $message->to('chapecoclass@gmail.com')->subject('Ajuda - '.$request->nome);
      });

      Session::flash('ajuda_sucesso','Sua mensagem foi enviada e será respondida em até 48h.');
      return Redirect::back();
    }

    public function paginaDeRegras () {
        return view('regras');
    }
}
