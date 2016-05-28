@extends('layouts.app')

@section('content')
  <div class="col-lg-9 content-right">

					<h2>Publicar anúncio</h2>
					<p>Preencha abaixo as características do seu classificado.</p>
					<hr>

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

					{!!Form::open()!!}
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Detalhes</h3>
							</div>
							<div class="panel-body">

								<div class="form-group">
                  <label>Tipo</label><br>
                  <div class="radio-inline">
                    <label><input type="radio" name="tipo" id="p" checked> Produto</label>
                  </div>
                  <div class="radio-inline">
                    <label><input type="radio" name="tipo" id="s"> Serviço</label>
                  </div>
								</div>

								@if($errors->has('codc'))
                  <div class="form-group text text-warning">
                @else
                  <div class="form-group">
                @endif
									<label for="codc">Categoria</label>
									<select id="codc" class="form-control">
										<option value="" selected="selected">Selecione a categoria</option>
									</select>
								</div>

								<div class="form-group">
									<label for="tituloa">Título</label>
									<input type="text" class="form-control" id="tituloa" placeholder="ex.: Celular Samsung Galaxy S2 ">
								</div>

								<div class="form-group">
									<label for="descricao">Descrição</label>
									<textarea id="descricao" class="form-control" rows="8"></textarea>
								</div>

								<div class="form-group">
									<label>Preço</label>
									<div class="form-inline">
										<div class="form-group">
											<div class="input-group" style="width: 150px;">
                        <span class="input-group-addon">R$</span>
                        <input type="text" class="form-control" id="valor">
											</div>
										</div>
										<div class="form-group">
											<p class="form-control-static" style="padding: 0 10px;">ou</p>
										</div>
                    <label><input type="checkbox" id="gratis" /> Grátis?</label>
									</div>
								</div>

                <div class="form-group" style="width: 150px">
                  <label>Quantidade de itens
                  <input type="text" class="form-control" id="qtitens">
                  </label>
                </div>

                <div class="form-group" style="width: 300px">
                  <label>Condição</label><br>
                  <div class="radio">
                    <label>
                      <input type="radio" name="condicao" id="n" checked>
                      Novo
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="condicao" id="u">
                      Usado
                    </label>
                  </div>
                </div>

              </div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Imagens do classificado</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label>Selecione as imagens</label>
									<input type="file" id="image1">
									<input type="file" id="image2">
									<input type="file" id="image3">
									<input type="file" id="image4">
									<input type="file" id="image5">
								</div>
								<div class="form-group">
									<label for="video">Vídeo (link do YouTube)</label>
									<div class="input-group">
										<input type="text" class="form-control" id="video">
										<span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
									</div>
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
										<label><input type="checkbox" id="prior"> Propaganda na página inicial do site (R$ 15,00)</label>
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
					</form>
				</div>
			</div>
@endsection
