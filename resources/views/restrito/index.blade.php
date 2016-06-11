@extends('restrito.header')

@section('body')

  <div class='container'>
    <div class='row'>
        <div class='panel col-md-12'>
          <div class='panel-body'>
            <div class='thumbnail col-md-4'>
              <a href='{{url('restrito/usuarios')}}' class='indexlink'>
                <img src='img/perfilplaceholder.png' class='img img-responsive'>
                Usuários</a>
            </div>
            <div class='thumbnail col-md-4'>
              <a href='{{url('restrito/anuncios')}}' class='indexlink'>
                <img src='img/tags.jpg' class='img img-responsive'>
                Anúncios</a>
            </div>
            <div class='thumbnail col-md-4'>
              <a href='{{url('restrito/denuncias')}}' class='indexlink'>
                <img src='img/denuncia.jpg' class='img img-responsive'>
                Denúncias</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
