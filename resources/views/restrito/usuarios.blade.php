@extends('restrito/header')


@section('body')
  <div class='container'>
    <div class='row'>
        <ol class='breadcrumb'>
          <li><a href='{{url('restrito')}}' style='color:#23f'>Home</a></li>
          <li>Usuários</li>
        </ol>

      <div class='panel col-md-12'>
        <div class='panel-body'>
          <a href="{{url('restrito/usuarios/novo')}}" class='btn btn-success'>Criar novo usuário</a><hr>
          {!! Form::open(['class'=>'col-md-12']) !!}
            <div class='form-group'>
              <input type='text' name='emailpesquisa' class='form-control' placeholder="procurar por e-mail">
              <input type='submit' value='Pesquisar' class='btn btn-primary'>
            </div>
          {!! Form::close() !!}
            @foreach($usuarios as $usuario)
              <hr>
              <a class='indexlink' href='{{url('restrito/usuarios/'.$usuario->email)}}'>{{$usuario->email}} - {{$usuario->nome}}</a>
            @endforeach
        </div>
      </div>
    </div>
  </div>

@endsection
