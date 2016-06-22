@extends('layouts.app')

@section('content')
    <div class='col-md-9'>
      <a href='{{url()->previous()}}'>voltar</a>
      <div class='panel panel-default'>
        <div class='panel-heading panel-title'>
          <i class='fa fa-key'></i> Alterar senha
        </div>
        <div class='panel-body'>
          @if(Session::has('erro_senha'))
            <div class='alert alert-danger bg-danger'>
              {{session('erro_senha')}}
            </div>
          @endif
          @if(Session::has('senha_sucesso'))
            <div class='alert alert-success bg-success'>
              {{session('senha_sucesso')}}
            </div>
          @endif
          {!! Form::open() !!}
            <div class='row'>
              @if($errors->has('senhaAntiga'))
                <div class='form-group col-md-6 col-md-offset-3 text-danger has-error'>
                  <label class='form-control-label' for='senhaAntiga'>Senha antiga: </label>
                  <input type='password' name='senhaAntiga' id='senhaAntiga' placeholder="sua senha antiga" class='form-control'/>
                  <span class='help-block'>
                    @foreach($errors->get('senhaAntiga') as $error)
                      {{$error}}<br>
                    @endforeach
                  </span>
                </div>
              @else
                <div class='form-group col-md-6 col-md-offset-3'>
                  <label class='form-control-label' for='senhaAntiga'>Senha antiga: </label>
                  <input type='password' name='senhaAntiga' id='senhaAntiga' placeholder="sua senha antiga" class='form-control'/>
                </div>
              @endif
            </div>
            <div class='row'>
              @if($errors->has('novaSenha'))
                <div class='form-group col-md-6 col-md-offset-3 text-danger has-error'>
                  <label class='form-control-label' for='novaSenha'>Nova senha: </label>
                  <input type='password' name='novaSenha' id='novaSenha' placeholder="nova senha" class='form-control'/>
                  <span class='help-block'>
                    @foreach($errors->get('novaSenha') as $error)
                      {{$error}}<br>
                    @endforeach
                  </span>
                </div>
              @else
                <div class='form-group col-md-6 col-md-offset-3'>
                  <label class='form-control-label' for='novaSenha'>Nova senha: </label>
                  <input type='password' name='novaSenha' id='novaSenha' placeholder="nova senha" class='form-control'/>
                </div>
              @endif
            </div>
            <div class='row'>
              <div class='form-group col-md-6 col-md-offset-3'>
                <label class='form-control-label' for='confirmNovaSenha'>Repita a nova senha: </label>
                <input type='password' name='novaSenha_confirmation' id='confirmNovaSenha' placeholder="confirmar nova senha" class='form-control'/>
              </div>
            </div>
            <div class='row'>
              <div class='col-md-2 col-md-offset-5'>
                <input type='submit' class='btn btn-success' value='Alterar senha'>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@endsection
