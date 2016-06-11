@extends('layouts.app')


@section('content')
  <div class='col-lg-9 content-left'>
    <h4>Negócios de {{ Auth::user()->nome }}</h4>

    <ul class="nav nav-tabs">
      <li role="presentation"><a href="{{url('anuncio/interesses')}}">Meus Interesses</a></li>
      <li role="presentation"><a href="{{url('anuncio/meusitens')}}">Meus anúncios</a></li>
      <li role="presentation" class="active"><a href="#">Interesses recebidos</a></li>
    </ul>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped table-hover">
            <th>
              <td>Anúncio</td>
              <td>Interessado</td>
              <td>Data</td>
              <td>Mensagem</td>
            </th>
            @foreach($interesses as $interesse)
              <tr>
                <td></td>
                <td><a href="{{url('anuncio/'.$interesse->id)}}">{{$interesse->tituloa}}</a></td>
                <td>{{$interesse->nome}}<br><small>{{$interesse->emaili}}</small></td>
                <td>{{$interesse->created_at}}</td>
                <td>{{$interesse->msg}}</td>
              </tr>
            @endforeach
          </table>
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
