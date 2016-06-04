@extends('layouts.inside')

@section('content')

<div class="col-lg-12 content-right">

  @yield('publicacaosuccess')

  <div class="row">
    <div class="col-xs-12">
      <h2>{{$anuncio->tituloa}}</h2>
    </div>
  </div>
  <div class="row">
		<div class="col-md-7">
			<div id="carousel-detail-classified" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-detail-classified" data-slide-to="0" class="active"></li>
					@if($anuncio->imagem2)
            <li data-target="#carousel-detail-classified" data-slide-to="1"></li>
          @endif
					@if($anuncio->imagem3)
            <li data-target="#carousel-detail-classified" data-slide-to="2"></li>
          @endif
					@if($anuncio->imagem4)
            <li data-target="#carousel-detail-classified" data-slide-to="3"></li>
          @endif
          @if($anuncio->imagem5)
            <li data-target="#carousel-detail-classified" data-slide-to="4"></li>
          @endif
				</ol>
			  <div class="carousel-inner">

          @if($anuncio->imagem1)
  					<div class="item active tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem1}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem2)
            <div class="item tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem2}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem3)
            <div class="item tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem3}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem4)
            <div class="item tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem4}}" class="img-responsive" />
  					</div>
          @endif
          @if($anuncio->imagem5)
            <div class="item tamimg">
  						<img src="/img/anuncio/{{$anuncio->imagem5}}" class="img-responsive" />
  					</div>
          @endif

				</div>
				<a class="left carousel-control" href="#carousel-detail-classified" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-detail-classified" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
  	<div class="col-md-5">
  		<table class="table table-condensed table-hover">
  		  <thead>
  				<th colspan="2">Detalhes:</th>
  			</thead>
  			<tbody style="font-size: 12px;">
  				<tr>
  					<td>ID do classificado</td>
  					<td>{{$anuncio->id}}</td>
  				</tr>
  				<tr>
  					<td>Preço</td>
  					<td>R${{$anuncio->valor}}</td>
  				</tr>
  				<tr>
  					<td>Condição</td>
  					<td>
              @if($anuncio->condicao == 'n')
                Produto novo
              @else
                Produto usado
              @endif
            </td>
  				</tr>
  				<tr>
  					<td>Categoria</td>
  					<td>{{$categoria->nomec}}</td>
  				</tr>
  				<tr>
  					<td>Métodos de Pagamento</td>
  					<td>Boleto, etc etc</td>
  				</tr>
  			</tbody>
  		</table>
  		<div class="row">
  			<div class="col-md-12">
  				<div style="padding: 5px; font-weight: bold;">Vendedor:</div>
  				<div class="well">
  					<div class="row">
  						<div class="col-sm-12">
  							<h4 style="margin-bottom: 0;"><a href="#">{{$vendedor->nome}}</a></h4>
  							<span title="Seller's rating: 4/5">
  								<span class="glyphicon glyphicon-star"></span>
  								<span class="glyphicon glyphicon-star"></span>
  								<span class="glyphicon glyphicon-star"></span>
  								<span class="glyphicon glyphicon-star"></span>
  								<span class="glyphicon glyphicon-star-empty"></span>
  							</span>
  							<br /><br />
  							<span class="glyphicon glyphicon-map-marker" title="Location"></span>
                  {{$vendedor->bairro}}, {{$vendedor->cidade}}, {{$vendedor->estado}}<br />
  							<span class="glyphicon glyphicon-envelope" title="E-mail"></span>
                  {{$vendedor->email}}<br />
  							<span class="glyphicon glyphicon-phone-alt" title="Telephone"></span>
                  {{$vendedor->tel1}}<br />
  						</div>
  					</div>
          </div>
  			</div>
  		</div>
  	</div>
  </div>
	<div class="row">
		<div class="col-md-12">
			<h4>Descrição</h4>
			<p style="text-align: justify;">{{$anuncio->descricao}}</p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<h4>Enviar mensagem de interesse ao vendedor</h4>
			<div class="panel panel-default">
				<div class="panel-body">
					{!! Form::open() !!}
            <input type="hidden" name="emaila" value="{{$anuncio->emaila}}">
            <input type="hidden" name="tituloa" value="{{$anuncio->tituloa}}">
						<div class="form-group">
							<label for="msg">Deixe sua mensagem abaixo: </label>
							<textarea class="form-control" id="msg" name="msg" placeholder="Escreva aqui sua mensagem" rows="5"></textarea>
						</div>
						<button class="btn btn-info" type="submit">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
