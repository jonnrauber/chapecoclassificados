@extends('restrito.header')

<?php
  $categorias = DB::select('select * from categorias');
  $pagamentos = DB::select('select * from pagamentos');
?>

@section('body')
  <div class='container'>
    <div class='row'>
        <div class='panel col-xs-12'>
          <div class='panel-body'>
            <div class='thumbnail col-xs-4'>
              <a href='{{url('restrito/usuarios')}}' class='indexlink'>
                <img src='img/perfilplaceholder.png' class='img img-responsive'>
                Usuários</a>
            </div>
            <div class='thumbnail col-xs-4'>
              <a href='{{url('restrito/anuncios')}}' class='indexlink'>
                <img src='img/tags.jpg' class='img img-responsive'>
                Anúncios</a>
            </div>
            <div class='thumbnail col-xs-4'>
              <a href='{{url('restrito/denuncias')}}' class='indexlink'>
                <img src='img/denuncia.jpg' class='img img-responsive'>
                Denúncias</a>
            </div>
          </div>
        </div>
      </div>
      <div class='row panel'>
        <div class='col-xs-4'>
          <h2>Adicionar Categoria</h2>
          {!! Form::open(['url' => 'restrito/addcat']) !!}
            <input class='form-control' type='text' name='nomec' value='{{old("nomec")}}' placeholder="Nome">
            <input class='form-control' type='text' name='codc' value='{{old("codsc")}}' placeholder="Codigo">
            <input type='file' name='foto'>
            <input type='submit' class='btn btn-success' value='Adicionar'>
          {!! Form::close() !!}
        </div>
        <div class='col-xs-8'>
          <table class='table'>
            <thead>
              <th>Categoria</th>
              <th>Sigla</th>
            </thead>
            @foreach($categorias as $cat)
              <tr>
                <td>{{$cat->nomec}}</td>
                <td>{{$cat->codc}}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
      <hr>
      <div class='row panel'>
        <div class='col-xs-4'>
          <h2>Adicionar Pagamento</h2>
          {!! Form::open(['url' => 'restrito/addpag']) !!}
            <input class='form-control' type='text' name='nomep' value='{{old("nomep")}}' placeholder="Nome">
            <input class='form-control' type='text' name='codp' value='{{old("codp")}}' placeholder="Codigo">
            <input type='submit' class='btn btn-success' value='Adicionar'>
          {!! Form::close() !!}
        </div>
        <div class='col-xs-8'>
          <table class='table'>
            <thead>
              <th>Forma de pagamento</th>
              <th>Código</th>
            </thead>
            @foreach($pagamentos as $pag)
              <tr>
                <td>{{$pag->nomep}}</td>
                <td>{{$pag->codp}}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>

@endsection
