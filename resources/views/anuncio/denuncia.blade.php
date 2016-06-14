@extends('layouts.inside')


@section('body')

  <a href="{{url('anuncio/'.$anuncio->id)}}"><< Voltar</a>
  <div class='panel panel-primary'>
    <div class='panel-heading'>
      Denunciar Anúncio ---> {{$anuncio->tituloa}}
    </div>
    <div class='panel-body'>
      @if(count($errors) > 0)
        <div class='alert alert-danger'>
          <ul class='list-unstyled'>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <strong>Anúncio</strong><br>
      Autor: {{$anuncio->nome}}<br>
      Título: {{$anuncio->tituloa}}
      <hr>
      {!! Form::open() !!}
        <input type='hidden' name='emaild' value='{{Auth::user()->email}}'>
        <input type='hidden' name='emaila' value='{{$anuncio->emaila}}'>
        <input type='hidden' name='id' value='{{$anuncio->id}}'>
        <label for='motivo'>Motivo:</label>
        <textarea name='motivo' id='motivo' class='form-control'></textarea>
        <input type='submit' class='btn btn-danger' value='Denunciar'>
      {!! Form::close() !!}
    </div>
  </div>

@endsection
