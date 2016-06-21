@extends('layouts.app')

@section('content')
  <?php
    $interesses1 = DB::select(
      'select * from interesses i where i.emaili = ? order by i.created_at desc',
      [Auth::user()->email]);
    $numeroInteresses = count($interesses1);
    //---------------------------------------------------
    $numeroInteressesRec = count($interesses);
    //---------------------------------------------------
    $anuncios = DB::select('
      select a.*, c.nomec from anuncios a
      join categorias c on c.codc = a.codc
      where a.emaila = ?
      order by a.created_at desc', [Auth::user()->email]);
    $numeroAnuncios= count($anuncios);
  ?>


  <div class='col-md-9'>
    <h4>Negócios de {{ Auth::user()->nome }}</h4>

    <ul class="nav nav-tabs nav-justified">
      <li role="presentation">
        <a href="{{url('anuncio/interesses')}}">Meus Interesses <span class="badge">{{$numeroInteresses}}</span></a>
      </li>
      <li role="presentation">
        <a href="{{url('anuncio/meusitens')}}">Meus anúncios <span class="badge">{{$numeroAnuncios}}</span></a>
      </li>
      <li role="presentation" class="active">
        <a href="#">Interesses recebidos <span class="badge">{{$numeroInteressesRec}}</span></a>
      </li>
    </ul>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-12">
          <div class='table-responsive'>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Anúncio</th>
                  <th>Interessado</th>
                  <th>Data</th>
                  <th>Mensagem</th>
                </tr>
              </thead>
              @foreach($interesses as $interesse)
                <tr>
                  <td><a href="{{url('anuncio/'.$interesse->id)}}">{{$interesse->tituloa}}</a></td>
                  <td>{{$interesse->nome}}<br><small>{{$interesse->emaili}}</small></td>
                  <td>{{date("d/m/y H:i",strtotime(str_replace('-','/', $interesse->created_at)))}}</td>
                  <td>{{$interesse->msg}}</td>
                </tr>
              @endforeach
            </table>
          </div>
          @if(!$interesses)
            <p style='text-align:center'>Você ainda não recebeu nenhum interesse por seus classificados.</p>
          @endif
        </div>
      </div>
    </div>
    <div class="panel-footer">
    </div>
  </div>
@endsection
