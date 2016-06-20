@extends('layouts.inside')

@section('content')
<?php
  $categorias = DB::table('categorias')->orderBy('nomec')->get();
?>

  <div class="col-md-3">
    {!! Form::open(['method' => 'GET', 'url' => 'pesquisa']) !!}
    <div class="well well-sm" style='margin: 0px auto'>
      <label for='titulo' class='control-label'>Procure anúncios:</label>
      <div class="input-group">
        <input type="text" class="form-control" value='{{old("titulo")}}' id='titulo' name="titulo">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </span>
      </div>
      <div class='row'>
        <div class='col-xs-12'>
          <h5>Localização</h5>
          <div class='col-xs-12'>
            <select name='estado' id='estado' class='form-control input-sm'></select>
          </div>
          <div class='col-xs-12'>
            <select name='cidade' id='cidade' class='form-control input-sm'></select>
          </div>
        </div>
        <div class='col-xs-12'>
          <h5>Faixa de preço <small>(vazio = sem limite)</small></h5>
          <div class='col-xs-6'>
            <input type='number' placeholder='de' value='{{old("minimo")}}' name='minimo' min=0 class='form-control input-sm'>
          </div>
          <div class='col-xs-6'>
            <input type='number' placeholder='até' value='{{old("maximo")}}' name='maximo' min=0 class='form-control input-sm'>
          </div>
        </div>
        <div class='col-xs-12'>
          <h5>Categoria</h5>
          <div class='col-xs-12'>
            <select name='cat' id='cat' class='form-control'>
              <option value=''>Selecione uma categoria</value>
              @foreach($categorias as $cat)
                <option value="{{$cat->codc}}">{{$cat->nomec}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>

  <div class='col-md-9'>
    <ol class='breadcrumb'>
      <li><a href='/'>Home</a></li>
      <li><a href='/categoria'>Categorias</a></li>
      <li>Pesquisa</li>
    </ol>
    @if(isset($filtros) && count($filtros)>0)
      <div class='alert alert-warning'>
        <ul class='list-inline'>
          @foreach($filtros as $filtro)
            <li>{{$filtro}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(count($anuncios) > 0)
      <table class="table">
        <th>
          <td>
            Título
          </td>
          <td>
            Preço
          </td>
          <td>
            Detalhes
          </td>
        </th>
        @foreach($anuncios as $anuncio)
          <tr>
            <td>
              <a href="{{url('anuncio/'.$anuncio->id)}}">
                @if($anuncio->imagem1)
                  <img src="{{url('/img/anuncio/'.$anuncio->imagem1)}}" class="img-responsive" width=150px>
                @else
                  <img src="{{url('/img/peqanuncioplaceholder.png')}}" class="img-responsive" width=100px>
                @endif
              </a>
            </td>
            <td>
              <a href="{{url('anuncio/'.$anuncio->id)}}">
                @if($anuncio->prior)
                  <i class='fa fa-star'></i>
                @endif
                {{$anuncio->tituloa}}
              </a>
            </td>
            <td>
              <strong>R${{number_format($anuncio->valor, 2, ',', '.')}}</strong>
            </td>
            <td>
              <small>
                @if($anuncio->condicao == 'n') Produto Novo
                @else Produto Usado
                @endif
              </small>|
              <small>
                Visitas: {{$anuncio->qtvisit}}
              </small><br>
              {{$anuncio->bairro}}, {{$anuncio->cidade}} - {{$anuncio->estado}}</td>
            <td></td>
          </tr>
        @endforeach
      </table>
      {{ $anuncios->render() }}
    @else
      <div class='alert alert-info'>
        Não há itens a serem exibidos nessa lista.
      </div>
    @endif
  </div>

  <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
  <script type="text/javascript">
    window.onload = function() {
      new dgCidadesEstados(
          document.getElementById('estado'),
          document.getElementById('cidade'),
          true
      );
    }
  </script>
@endsection
