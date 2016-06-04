@extends('layouts.inside')

@section('content')

  <div class="col-lg-2">
    <div class='col-lg-12'>
      <h4>Filtrar busca</h4>
      Localização<hr>
      Faixa de preço
    </div>
  </div>
  <div class='col-lg-10'>

    @if(count($anuncios) > 0)
      <table class="table">
        <th>
          <td>
            Título
          </td>
          <td>
            Preço
          </td>
          <td>
            Detalhes
          </td>
        </th>
        @foreach($anuncios as $anuncio)
          <tr>
            <td>
              <a href="{{url('anuncio/'.$anuncio->id)}}">
                <img src="{{url('/img/anuncio/'.$anuncio->imagem1)}}" class="img-responsive" width=150px>
              </a>
            </td>
            <td>
              <a href="{{url('anuncio/'.$anuncio->id)}}">{{$anuncio->tituloa}}</a>
            </td>
            <td>
              <strong>R${{$anuncio->valor}}</strong>
            </td>
            <td>
              <small>
                @if($anuncio->condicao == 'n') Produto Novo
                @else Produto Usado
                @endif
              </small>|
              <small>
                Visitas: {{$anuncio->qtvisit}}
              </small><br>
              {{$anuncio->bairro}}, {{$anuncio->cidade}}</td>
            <td></td>
          </tr>
        @endforeach
      </table>
    @else
      <div class='alert alert-info'>
        Ainda não existem produtos cadastrados nesta categoria.
      </div>
    @endif
  </div>

@endsection
