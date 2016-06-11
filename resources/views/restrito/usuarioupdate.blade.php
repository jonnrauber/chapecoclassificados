@extends('restrito/header')


@section('body')
  {!! Form::open() !!}
  <div class='panel panel-default'>
    <div class='panel-heading'>
      <h4>Dados de <strong>{{$usuario->email}}</strong></h4>
    </div>
    <div class='panel-body'>
      <div class='col-md-7'>
        <input type='hidden' name='email' value='{{$usuario->email}}'>
        <label>
          Nome
          <input type='text' name='nome' value='{{$usuario->nome}}' class='form-control'>
        </label><br>
        <label>
          Senha
          <input type='password' name='senha' value='{{$usuario->senha}}'  class='form-control'>
        </label><br>
        <label>
          Telefone 1
          <input type='text' name='tel1' value='{{$usuario->tel1}}' class='form-control'>
        </label><br>
        <label>
          Telefone 2
          <input type='text' name='tel2' value='{{$usuario->tel2}}' class='form-control'>
        </label><br>
        <label>
          Bairro
          <input type='text' name='bairro' value='{{$usuario->bairro}}' class='form-control'>
        </label><br>
        <label>
          Cidade
          <input type='text' name='cidade' value='{{$usuario->cidade}}' class='form-control'>
        </label><br>
        <label>
          Estado
          <input type='text' name='estado' value='{{$usuario->estado}}' class='form-control'>
        </label><br>
        <label>
          País
          <input type='text' name='pais' value='{{$usuario->pais}}' class='form-control'>
        </label><br>
        <input type='submit' value='Atualizar informações' class='btn btn-success'>
        {!! Form::close() !!}
      </div>
      <div class='col-md-5'>
        <a href="{{url('restrito/usuarios/delete/'.$usuario->email)}}" class='btn btn-danger'>Apagar usuário</a>
      </div>
    </div>
  </div>


@endsection
