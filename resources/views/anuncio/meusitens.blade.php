@extends('layouts.app')

@section('content')
<div class='col-lg-9 content-left'>
  <h4>Negócios de {{ Auth::user()->nome }}</h4>

  <ul class="nav nav-tabs">
    <li role="presentation"><a href="{{url('anuncio/interesses')}}">Meus Interesses</a></li>
    <li role="presentation" class="active"><a href="#">Meus anúncios</a></li>
    <li role="presentation"><a href="{{url('anuncio/recebidos')}}">Interesses recebidos</a></li>
  </ul>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="pull-right">
          <a href="url('anuncio/meusitens/editar')">editar</a>
        </div>
        <table class="table table-striped table-hover">
          <th>
            <td>cat.</td>
            <td>título</td>
            <td>preço</td>
            <td>nº visitas</td>
            <td>publicado em:</td>
            <td>expira em:</td>
          </th>
          @foreach($anuncios as $anuncio)
            <tr>
                <td></td>
                <td>{{$anuncio->codc}}</td>
                <td><a href="{{url('anuncio/'.$anuncio->id)}}">{{$anuncio->tituloa}}</a></td>
                <td>{{$anuncio->valor}}</td>
                <td>{{$anuncio->qtvisit}}</td>
                <td>{{$anuncio->created_at}}</td>
                <td>{{$anuncio->dataex}}</td>
            </tr>
          @endforeach
        </table>
        @if(!$anuncios)
          <p style='text-align:center'>Nenhum anuncio cadastrado até o momento.
          <a href='{{url('anuncio/novo')}}'>cadastrar »</a></p>
        @endif
      </div>
    </div>
  </div>
  <div class="panel-footer">
  </div>
</div>


<?
//consulta php para pegar os anuncios do usuario

?>
@endsection
