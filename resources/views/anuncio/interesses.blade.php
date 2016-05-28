@extends('layouts.app')

@section('content')
<div class='col-lg-9 content-left'>
  <h4>Negócios de {{ Auth::user()->nome }}</h4>

  <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">Meus Interesses</a></li>
    <li role="presentation"><a href="{{url('anuncio/meusitens')}}">Meus anúncios</a></li>
  </ul>
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-striped table-hover">
          <th>
            <td>Título</td>
            <td>Anunciante</td>
            <td>Data do interesse</td>
          </th>
          @foreach($interesses as $interesse)
            <tr>
              <td></td>
              <td>{{$interesse->tituloa}}</td>
              <td>{{$interesse->emaila}}</td>
              <td>{{$interesse->created_at}}</td>
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


<?
//consulta php para pegar os interesses do usuario

?>
@endsection
