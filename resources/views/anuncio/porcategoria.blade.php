@extends('layouts.inside')

@section('content')

  <div class="col-sm-3">
    <div class="well well-sm">
      {!!Form::open(['url' => 'pesquisa']) !!}
        <label for='titulo' class='control-label'>Procure anúncios:</label>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="" id='titulo' name="titulo">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
          </span>
        </div>
      </form>
    </div>
    <div class='col-md-12'>
      <h4>Filtrar busca</h4>
      <h4>Localização</h4>
      {!!
      Form::open(['url' => 'anuncio/por-localizacao']),
        ControlGroup::generate(
          Form::label('estado','Estado', ['class'=>'control-label']),
          Form::select('estado'),
          null,
          3, 9
        ),
        ControlGroup::generate(
          Form::label('cidade', 'Cidade'),
          Form::select('cidade'),
          null,
          3, 9
        ),
        Form::submit('Buscar', ['class' => 'btn btn-warning']),
      Form::close()
      !!}
      <br>
      <h4>Faixa de preço</h4>
      {!!
        Form::open(['url' => 'anuncio/por-preco'])
      !!}
        De: <input type='number' placeholder='0' name='minimo' min=0><br>
        Até: <input type='number' placeholder='0' name='maximo' min=0>
      {!!
          Form::submit('Buscar', ['class' => 'btn btn-warning']),
        Form::close()
      !!}
      <hr>
    </div>
    <div class='col-md-12'>
      <h4>Categorias</h4>
      <ul class="list-unstyled">
        <li><a href="{{url('categoria/CAR')}}">Carros</a></li>
        <li><a href="{{url('categoria/MOT')}}">Motos</a></li>
        <li><a href="{{url('categoria/CEL')}}">Celulares</a></li>
        <li><a href="{{url('categoria/PCS')}}">Computadores & Notebooks</a></li>
        <li><a href="{{url('categoria/ROU')}}">Roupas & Acessórios</a></li>
        <li><a href="{{url('categoria/IMO')}}">Imóveis</a></li>
        <li><a href="{{url('categoria/OUT')}}">Outros</a></li>
      </ul>
    </div>
  </div>

  <div class='col-sm-9'>
    <ol class='breadcrumb'>
      <li><a href='/'>Home</a></li>
      <li><a href='/categoria'>Categorias</a></li>
      <li></li>
    </ol>
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
                @if($anuncio->imagem1)
                  <img src="{{url('/img/anuncio/'.$anuncio->imagem1)}}" class="img-responsive" width=150px>
                @else
                  <img src="{{url('/img/peqanuncioplaceholder.png')}}" class="img-responsive" width=100px>
                @endif
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
        Não há itens a serem exibidos nessa lista.
      </div>
    @endif
  </div>

  <script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-v0.2.js"></script>
  <script type="text/javascript">
    window.onload = function() {
      new dgCidadesEstados(
          document.getElementById('estado'),
          document.getElementById('cidade'),
          true
      );
    }
  </script>
@endsection
