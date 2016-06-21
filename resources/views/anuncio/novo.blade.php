<?php
  $categorias = DB::table('categorias')
                    ->orderBy('nomec')
                    ->get();
  $pagamentos = DB::table('pagamentos')
                    ->orderBy('nomep')
                    ->get();
?>

@extends('layouts.inside')

@section('content')
    <!-- barra de navegação hierárquica -->
    <div class='col-md-12'>
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>Publicar anúncio</li>
      </ol>
    </div>
    <div class="col-md-9">

      @yield('novosuccess')

  		<h3>Publicar anúncio</h3>
  		<p>Preencha abaixo as características do seu classificado.</p>
  		<hr>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <div class="col-md-6">
			{!!Form::open(['files' => true])!!}
      <input type='hidden' name='emaila' value='{{Auth::user()->email}}'>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Detalhes</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
            <label>Tipo</label><br>
            <div class="radio-inline">
              <label><input type="radio" name="tipo" value="p" onclick="novoPerfilProdServ();"checked> Produto</label>
            </div>
            <div class="radio-inline">
              <label><input type="radio" name="tipo" value="s" onclick="novoPerfilProdServ();"> Serviço</label>
            </div>
					</div>

          <div class="form-group">
						<label for="codc">Categoria</label>
						<select name="codc" class="form-control">
							<option value="" selected="selected">Selecione a categoria</option>
              @foreach($categorias as $cat)
                <option value='{{$cat->codc}}'>{{$cat->nomec}}</option>
              @endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="tituloa">Título</label>
						  <input type="text" maxlength="100" class="form-control" name="tituloa" placeholder="ex.: Celular Samsung Galaxy S2" value="{{old('tituloa')}}">
					</div>

					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea name="descricao" class="form-control" rows="8">{{old('descricao')}}</textarea>
					</div>
					<div class="form-group">
						<label>Preço</label>
						<div class="form-inline">
							<div class="form-group">
								<div class="input-group" style="width: 150px;">
                  <span class="input-group-addon">R$</span>
                  <input type="text" class="form-control" id="valor" name="valor" value="{{old('valor')}}">
								</div>
							</div>
							<div class="form-group">
								<p class="form-control-static" style="padding: 0 10px;">ou</p>
                <label><input type="checkbox" name="gratis" onclick="ehGratis();" /> Grátis?</label>
							</div>
						</div>
					</div>
          <div class="form-group qtitens" style="width: 150px">
            <label>Quantidade de itens
            <input type="text" class="form-control" name="qtitens" value="{{old('qtitens')}}">
            </label>
          </div>

          <div class="form-group condicao" style="width: 300px">
            <label>Condição</label><br>
            <div class="radio">
              <label>
                <input type="radio" name="condicao" value="n" checked>
                Novo
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="condicao" value="u">
                Usado
              </label>
            </div>
          </div>

          <div class='form-group pagamentos'>
            <select name="codp" class="form-control">
							<option value="" selected="selected">Selecione a forma de pagamento</option>
              @foreach($pagamentos as $pag)
                <option value='{{$pag->codp}}'>{{$pag->nomep}}</option>
              @endforeach
						</select>
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
						<input type="file" name="imagem1" id="imagem1">
						<input type="file" name="imagem2" id="imagem2">
						<input type="file" name="imagem3" id="imagem3">
						<input type="file" name="imagem4" id="imagem4">
						<input type="file" name="imagem5" id="imagem5">
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
      <div class="well">
        <h3>Publicar</h3>
				<div class="checkbox">
					<label><input type="checkbox" required>
            Declaro que li e concordo com os <a href="#">Termos de Uso</a>.
          </label>
				</div>
				<button type="submit" class="btn btn-success">Finalizar</button>
			</div>
    </div>

    <script type="text/javascript">
      window.onload = function() {
        novoPerfilProdServ();
      }

    </script>

  {!!Form::close()!!}
@endsection
