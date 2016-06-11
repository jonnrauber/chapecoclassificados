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
          <table class='table table-hover'>
            <th>
              <td>E-mail</td>
              <td>Titulo</td>
              <td>Data de criação</td>
              <td>Data de expiração</td>
              <td>Situação</td>
            </th>
            @foreach($anuncios as $anuncio)
              <tr>
                <td></td>
                <td>{{$anuncio->email}}</td>
                <td>{{$anuncio->tituloa}}</td>
                <td>{{$anuncio->created_at}}</td>
                <td>{{$anuncio->dataex}}</td>
                <td></td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
