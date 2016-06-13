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
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Título</th>
              <th>Categoria</th>
              <th>Preço</th>
              <th>Nº visitas</th>
              <th>Publicado em:</th>
              <th>Expira em:</th>
            </tr>
          </thead>
          @foreach($anuncios as $anuncio)
            <tr>
                <td><a href="{{url('anuncio/'.$anuncio->id)}}">{{$anuncio->tituloa}}</a></td>
                <td>{{$anuncio->nomec}}</td>
                <td>R${{number_format($anuncio->valor, 2, ',', '.')}}</td>
                <td>{{$anuncio->qtvisit}}</td>
                <td>{{date("d/m/y h:i",strtotime(str_replace('-','/', $anuncio->created_at)))}}</td>
                <td>{{date("d/m/y h:i",strtotime(str_replace('-','/', $anuncio->dataex)))}}</td>
                <td><a href='{{url('anuncio/editar/'.$anuncio->id)}}'><b class='fa fa-pencil'></b></a></td>
                <td><a href='{{url('anuncio/deletar/'.$anuncio->id)}}' onclick="return confirm('Tem certeza que deseja deletar o anúncio?');"><b class='fa fa-trash'></b></a></td>
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
@endsection
