@extends('restrito.header')

@section('body')
  <div class='container'>
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='{{url('restrito')}}' style='color:#23f'>Home</a></li>
        <li>Denúncias</li>
      </ol>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h4>Central de denúncias</h4>
        </div>
        <div class='panel panel-body'>
          {!!
            Form::inline(),
              Form::text('email'),
              Form::submit('Listar', ['class' => 'btn btn-primary']),
            Form::close()
          !!}
          <table class='table table-hover table-striped'>
            <thead><tr>

              <th>Autor</th>
              <th>ID Anúncio</th>
              <th>Email Anunciante</th>
              <th>Data</th>
              <th>Motivo</th>
            </tr></thead>
            @foreach($denuncias as $denuncia)
              <tr>
                <a href='{{url('restrito/denuncias/'.$denuncia->id)}}'>
                  <td>{{$denuncia->emaild}}</td>
                  <td><a href="{{url('anuncio/'.$denuncia->id)}}" class='indexlink btn-block' target='_blank'>{{$denuncia->id}}</a></td>
                  <td>{{$denuncia->emaila}}</td>
                  <td>{{date("d/m/y H:i:s",strtotime(str_replace('-','/', $denuncia->created_at)))}}</td>
                  <td>{{$denuncia->motivo}}</td>
                </a>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
