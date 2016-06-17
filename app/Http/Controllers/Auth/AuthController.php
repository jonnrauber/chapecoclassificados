<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      $rules = [
        'nome' => 'required',
        'email' => 'required|unique:usuarios,email',
        'password' => 'required|min:6|confirmed',
        'tel1' => 'required|min:10|numeric',
        'pais' => 'required',
        'estado' => 'required',
        'cidade' => 'required',
        'bairro' => 'required'
      ];
      $messages = [
        'nome.required' => 'Preencha o campo nome.',
        'email.required' => 'Preencha o campo e-mail.',
        'password.required' => 'Preencha o campo senha.',
        'password.min' => 'Sua senha deve possuir no mínimo 6 caracteres.',
        'password.confirmed' => 'Os campos de senha não conferem.',
        'tel1.required' => 'Você deve cadastrar pelo menos um telefone.',
        'tel1.min' => 'O campo telefone deve possuir no mínimo 10 digitos.',
        'tel1.numeric' => 'Digite apenas números no campo telefone',
        'estado.required' => 'Escolha o seu estado',
        'cidade.required' => 'Escolha a sua cidade',
        'bairro.required' => 'Preencha o campo bairro'
      ];
      return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tel1' => $data['tel1'],
            'tel2' => $data['tel2'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'pais' => $data['pais'],
        ]);
    }
}
