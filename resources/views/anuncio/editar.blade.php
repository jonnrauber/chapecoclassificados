@extends('layouts.header')

@section('body')
  <ol class='breadcrumb'>
    <li><a href='{{url("/")}}'>Home</a></li>
    <li><a href='{{url("anuncio/meusitens")}}'>Meus Anúncios</a></li>
    <li><a href='{{url("anuncio/".$anuncio->id)}}'>{{$anuncio->tituloa}}</a></li>
    <li>Editar</li>
  </ol>
  <div class="row">
    <div class="col-md-6">
      {!!Form::open(['files'=>true])!!}
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Detalhes</h3>
          </div>
          <div class="panel-body">

            <div class="form-group">
              <label>Tipo</label><br>
              <div class="radio-inline">
                <label><input type="radio" name="tipo" value="p" @if($anuncio->tipo == 'p') checked @endif> Produto</label>
              </div>
              <div class="radio-inline">
                <label><input type="radio" name="tipo" value="s" @if($anuncio->tipo == 's') checked @endif> Serviço</label>
              </div>
            </div>

            <div class="form-group">
              <label for="codc">Categoria</label>
              <select name="codc" class="form-control">
                <option value="">Selecione a categoria</option>
                @foreach($categorias as $cat)
                  <option value='{{$cat->codc}}' @if($cat->codc == $anuncio->codc) selected @endif>{{$cat->nomec}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="tituloa">Título</label>
                <input type="text" class="form-control" name="tituloa" value="{{$anuncio->tituloa}}">
            </div>

            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea name="descricao" class="form-control" rows="8">{{$anuncio->descricao}}</textarea>
            </div>

            <div class="form-group">
              <label>Preço</label>
              <div class="form-inline">
                <div class="form-group">
                  <div class="input-group" style="width: 150px;">
                    <span class="input-group-addon">R$</span>
                    <input type="text" class="form-control" name="valor" value="{{$anuncio->valor}}">
                  </div>
                </div>
                <div class="form-group">
                  <p class="form-control-static" style="padding: 0 10px;">ou</p>
                </div>
                <label><input type="checkbox" name="gratis" /> Grátis?</label>
              </div>
            </div>

            <div class="form-group" style="width: 150px">
              <label>Quantidade de itens
              <input type="text" class="form-control" name="qtitens" value="{{$anuncio->qtitens}}">
              </label>
            </div>

            <div class="form-group" style="width: 300px">
              <label>Condição</label><br>
              <div class="radio">
                <label>
                  <input type="radio" name="condicao" value="n" @if($anuncio->condicao == 'n') checked @endif>
                  Novo
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="condicao" value="u" @if($anuncio->condicao == 'u') checked @endif>
                  Usado
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Imagens do classificado</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label>Selecione as imagens</label>
              <input type="file" name="imagem1">
              <input type="file" name="imagem2">
              <input type="file" name="imagem3">
              <input type="file" name="imagem4">
              <input type="file" name="imagem5">
            </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Opções extras</h3>
          </div>
          <div class="panel-body">
            <div class="well">
              <label>Patrocinar anúncio</label>
              <div class="checkbox" style="margin-top: 0;">
                <label><input type="checkbox" name="prior"> Propaganda na página inicial do site (R$ 15,00)</label>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
      </div>
    </div>
@endsection
