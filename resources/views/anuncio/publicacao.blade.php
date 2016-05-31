@extends('layouts.app')

@section('content')

<div class="col-lg-9">
  <div class="row">
    <div class="col-xs-12">
      <h2>{{$anuncio->tituloa}}</h2>
    </div>
  </div>
  <div class="row">
		<div class="col-md-8">
			<div id="carousel-detail-classified" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-detail-classified" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-detail-classified" data-slide-to="1"></li>
					<li data-target="#carousel-detail-classified" data-slide-to="2"></li>
					<li data-target="#carousel-detail-classified" data-slide-to="3"></li>
				</ol>
			  <div class="carousel-inner">
					<div class="item-active">
						<img src="http://placehold.it/1024x768/e0e0e0/&text=Image+2" class="img-responsive" />
					</div>
					<div class="item">
						<img src="http://placehold.it/1024x768/e0e0e0/&text=Image+3" class="img-responsive" />
					</div>
					<div class="item">
						<img src="http://placehold.it/1024x768/e0e0e0/&text=Image+4" class="img-responsive" />
					</div>
				  <div class="item">
						<img src="http://placehold.it/1024x768/e0e0e0/&text=Image+5" class="img-responsive" />
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-detail-classified" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-detail-classified" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
  	<div class="col-md-4">
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
              {{$anuncio->condicao}}
            </td>
  				</tr>
  				<tr>
  					<td>Brand</td>
  					<td>Samsung</td>
  				</tr>
  				<tr>
  					<td>Categoria</td>
  					<td>{{$anuncio->codc}}</td>
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
					<form action="{{url('anuncio/'.$anuncio->id)}}" method="POST">
						<div class="form-group">
							<label for="InputText">Deixe sua mensagem abaixo: </label>
							<textarea class="form-control" id="InputText" name="message" placeholder="Escreva aqui sua mensagem" rows="5" style="margin-bottom:10px;"></textarea>
						</div>
						<button class="btn btn-info" type="submit">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
