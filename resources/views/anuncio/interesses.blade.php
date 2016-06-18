@extends('layouts.app')

@section('content')
<div class='col-lg-9 content-left'>
  <h4>Negócios de {{ Auth::user()->nome }}</h4>
  <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">Meus Interesses</a></li>
    <li role="presentation"><a href="{{url('anuncio/meusitens')}}">Meus anúncios</a></li>
    <li role="presentation"><a href="{{url('anuncio/recebidos')}}">Interesses recebidos</a></li>
  </ul>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-12">
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
