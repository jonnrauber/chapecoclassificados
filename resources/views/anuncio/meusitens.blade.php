@extends('layouts.app')

@section('content')
  <?php
    $interesses1 = DB::select(
      'select * from interesses i where i.emaili = ? order by i.created_at desc',
      [Auth::user()->email]);
    $numeroInteresses = count($interesses1);
    //---------------------------------------------------
    $interessesrec = DB::select(
      'select i.*, a.tituloa, a.emaila, u.nome from interesses i
      join anuncios a on i.id = a.id
      join usuarios u on i.emaili = u.email
      where a.emaila = ?
      order by i.created_at desc', [Auth::user()->email]);
    $numeroInteressesRec = count($interessesrec);
    //---------------------------------------------------
    $numeroAnuncios = count($anuncios);
  ?>


<div class='col-md-9'>
  <h4>Negócios de {{ Auth::user()->nome }}</h4>

  <ul class="nav nav-tabs nav-justified">
    <li role="presentation">
      <a href="{{url('anuncio/interesses')}}">Meus Interesses <span class="badge">{{$numeroInteresses}}</span></a>
    </li>
    <li role="presentation" class="active">
      <a href="#">Meus anúncios <span class="badge">{{$numeroAnuncios}}</span></a>
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
                  <td>{{date("d/m/y H:i",strtotime(str_replace('-','/', $anuncio->created_at)))}}</td>
                  <td>{{date("d/m/y H:i",strtotime(str_replace('-','/', $anuncio->dataex)))}}</td>
                  <td><a href='{{url('anuncio/editar/'.$anuncio->id)}}'><b class='fa fa-pencil text-success'></b></a></td>
                  <td><a href='{{url('anuncio/deletar/'.$anuncio->id)}}' onclick="return confirm('Tem certeza que deseja deletar o anúncio?');"><b class='fa fa-trash text-danger'></b></a></td>
              </tr>
            @endforeach
          </table>
        </div>
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
