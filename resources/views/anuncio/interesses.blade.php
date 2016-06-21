@extends('layouts.app')

<?php
  $numeroInteresses = count($interesses);
  //---------------------------------------------------
  $interessesrec = DB::select(
    'select i.*, a.tituloa, a.emaila, u.nome from interesses i
    join anuncios a on i.id = a.id
    join usuarios u on i.emaili = u.email
    where a.emaila = ?
    order by i.created_at desc', [Auth::user()->email]);
  $numeroInteressesRec = count($interessesrec);
  //---------------------------------------------------
  $anuncios = DB::select('
    select a.*, c.nomec from anuncios a
    join categorias c on c.codc = a.codc
    where a.emaila = ?
    order by a.created_at desc', [Auth::user()->email]);
  $numeroAnuncios= count($anuncios);
?>


@section('content')
<div class='col-md-9'>
  <h4>Negócios de {{ Auth::user()->nome }}</h4>
  <ul class="nav nav-tabs nav-justified">
    <li role="presentation" class="active">
      <a href="#">Meus Interesses <span class="badge">{{$numeroInteresses}}</span></a>
    </li>
    <li role="presentation">
      <a href="{{url('anuncio/meusitens')}}">Meus anúncios <span class="badge">{{$numeroAnuncios}}</span></a>
    </li>
    <li role="presentation">
      <a href="{{url('anuncio/recebidos')}}">Interesses recebidos <span class="badge">{{$numeroInteressesRec}}</span></a>
    </li>
  </ul>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-12">
        <div class='table-responsive'>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Título</th>
                <th>Anunciante</th>
                <th>Data</th>
                <th>Mensagem</th>
              </tr>
            </thead>
            @foreach($interesses as $interesse)
              <tr>
                <td><a href="{{url('anuncio/'.$interesse->id)}}">{{$interesse->tituloa}}</a></td>
                <td>{{$interesse->nome}}<br /><small>{{$interesse->emaila}}</small></td>
                <td>{{date("d/m/y H:i",strtotime(str_replace('-','/', $interesse->created_at)))}}</td>
                <td>{{$interesse->msg}}</td>
              </tr>
            @endforeach
          </table>
        </div>
        @if(!$interesses)
          <p style='text-align:center'>Você ainda não se interessou por nenhum classificado.</p>
        @endif
      </div>
    </div>
  </div>
  <div class="panel-footer">
  </div>
</div>
@endsection
