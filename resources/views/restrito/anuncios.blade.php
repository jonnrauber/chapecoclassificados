@extends('restrito/header')


@section('body')

  <div class='container'>
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='{{url('restrito')}}' style='color:#23f'>Home</a></li>
        <li>Anúncios</li>
      </ol>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h4>Listar anúncios por usuário</h4>
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
              <th>ID</th>
              <th>Titulo</th>
              <th>Data de criação</th>
              <th>Data de expiração</th>
              <th>Patrocinado</th>
              <th>Situação</th>
            </tr></thead>
            @foreach($anuncios as $anuncio)
              <tr>
                  <td><a href='{{url("restrito/usuarios/".$anuncio->email)}}' class='indexlink'>{{$anuncio->nome}}<br>{{$anuncio->email}}</a></td>
                  <td>{{$anuncio->id}}</td>
                  <td>{{$anuncio->tituloa}}</td>
                  <td>{{date("d/m/y H:i:s",strtotime(str_replace('-','/', $anuncio->created_at)))}}</td>
                  <td>{{date("d/m/y H:i:s",strtotime(str_replace('-','/', $anuncio->dataex)))}}</td>
                  <td>
                    @if($anuncio->prior)
                      <i class='fa fa-check text-success'></i>
                    @else
                      <i class='fa fa-times text-danger'></i>
                    @endif
                  </td>
                  <td>
                    @if(strtotime('today') > strtotime($anuncio->dataex))
                      Expirado
                    @else
                      Ativo
                    @endif
                  </td>
                  <td>
                    <a href='{{url('anuncio/'.$anuncio->id)}}' class='indexlink'><i class='fa fa-search'></i></a>
                  </td>
                  <td>
                    <a href='{{url('restrito/anuncios/delete/'.$anuncio->id)}}'
                      onclick='return confirm("Tem certeza que deseja deletar o anúncio?")'
                      class='indexlink'>
                      <i class='fa fa-trash-o'></i>
                    </a>
                  </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
